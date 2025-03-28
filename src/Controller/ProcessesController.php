<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenDate;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Processes Controller
 *
 * @property \App\Model\Table\ProcessesTable $Processes
 * @method \App\Model\Entity\Process[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcessesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        $page = $this->request->getQuery('page', 1);

        $limit = 10;
        $paginationSettings = [
            'limit' => $limit, // Número de registros por página
            'order' => [
                'Processes.created' => 'desc'
            ]
        ]; // Ordenação dos registros


        $query = $this->Processes->find('all')->contain([
            'Natures',
            'Objectives',
            'Casos',
            'AirlineCompanies',
            'Districts',
            'Districts.Cities',
            'Districts.Cities.States',
            'Results',
            'Types',
            'Judges',
            'Requests'
        ]);

        $q = $this->request->getQuery('q');

        if ($q) {
            $type = $this->request->getQuery('type', '');

            if ($type == '' || $type == 'todos') {
                $query->where([
                    'or' => [
                        'Natures.name LIKE' => '%' . $q . '%',
                        'Objectives.name LIKE' => '%' . $q . '%',
                        'Casos.name LIKE' => '%' . $q . '%',
                        'AirlineCompanies.name LIKE' => '%' . $q . '%',
                        'Districts.name LIKE' => '%' . $q . '%',
                        'Results.name LIKE' => '%' . $q . '%',
                        'Types.name LIKE' => '%' . $q . '%',
                        'Judges.name LIKE' => '%' . $q . '%',
                        'Requests.name LIKE' => '%' . $q . '%',
                    ],
                ]);
            } elseif ($type == 'comarca') {
                $query->where([
                    'or' => [
                        'Districts.name LIKE' => '%' . $q . '%',
                        'Cities.name LIKE' => '%' . $q . '%',
                        'States.name LIKE' => '%' . $q . '%',
                    ],
                ]);
            } elseif ($type == 'juiz') {
                $query->where([
                    'or' => [
                        'Judges.name LIKE' => '%' . $q . '%',
                    ],
                ]);
            } elseif ($type == 'cia') {
                $query->where([
                    'or' => [
                        'AirlineCompanies.name LIKE' => '%' . $q . '%',
                    ],
                ]);
            } elseif ($type == 'natureza') {
                $query->where([
                    'or' => [
                        'Natures.name LIKE' => '%' . $q . '%',
                    ],
                ]);
            } elseif ($type == 'objeto') {
                $query->where([
                    'or' => [
                        'Objectives.name LIKE' => '%' . $q . '%',
                    ],
                ]);
            } elseif ($type == 'result') {
                $query->where([
                    'or' => [
                        'Results.name LIKE' => '%' . $q . '%',
                        'Types.name LIKE' => '%' . $q . '%',
                    ],
                ]);
            }

            // Conta o total de registros para a consulta
            $totalRecords = $query->count();
            // Calcula o total de páginas disponíveis
            $totalPages = ceil($totalRecords / $limit);

            // Garante que a página solicitada não ultrapasse o total de páginas
            $page = min(max($page, 1), $totalPages);

            $queryParams = $this->getRequest()->getQueryParams();
            $queryParams['page'] = $page;
            $this->setRequest($this->getRequest()->withQueryParams($queryParams));

            $processes = $this->paginate($query, $paginationSettings);
        } else {
            $processes = [];
        }

        $this->set(compact('processes'));

        $this->render('search_table');
    }

    public function myProcesses($import_id = null)
    {
        $user_id = $this->getLoggedUserId();
        $processes = $this->Processes->find()->contain([
            'Natures',
            'Objectives',
            'Casos',
            'AirlineCompanies',
            'Districts',
            'Districts.Cities',
            'Districts.Cities.States',
            'Results',
            'Types',
            'Judges',
            'Requests',
        ])->where(["user_id" => $user_id]);
        if ($import_id) {
            $processes->where(["import_id" => $import_id]);
        }

        foreach ($processes as $process) {
            $process->divided_value = null;
            if ($process->value_requests) {
                if (strpos($process->value_requests, "R$") === 0) {
                    $process->value_requests = trim(str_replace('R$', '', $process->value_requests));
                }
                if (strpos($process->value_requests, ",")) {
                    $process->value_requests = str_replace(',', '.', $process->value_requests);
                }
                $process->value_requests = (float)$process->value_requests;
                if ($process->authors) {
                    $process->divided_value = number_format($process->value_requests / $process->authors, 2, ',', '');
                }
                $process->value_requests = number_format($process->value_requests, 2, ',', '');
            }
        }
        $processes = $processes->orderDesc("Processes.created")->toArray();
        $this->set(compact('processes'));
    }

    public function myImports($user_id = null)
    {
        $user_id = $user_id ?? $this->getLoggedUserId();
        $imports = $this->Processes->Imports->find()->where(["user_id" => $user_id])->contain("Processes")->toArray();
        foreach ($imports as $import) {
            $import->approved_processes = 0;
            $import->desapproved_processes = 0;
            $import->waiting_processes = 0;
            $import->existing_processes = $import->total_processes;
            foreach ($import->processes as $process) {
                if (!$process->approved_by) {
                    $import->waiting_processes++;
                } else if ($process->reason) {
                    $import->desapproved_processes++;
                } else {
                    $import->approved_processes++;
                }
                $import->existing_processes--;
            }
            $import->date = $import->created->format("d/m/Y H:i:s");
        }
        $this->set(compact('imports'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($view = "default", $tableName = null)
    {
        $this->paginate = [
            'contain' => ['AirlineCompanies', 'Districts', 'Judges'],
        ];

        list($processes, $q) = $this->searchProcesses();
        $processes->andWhere(['approved_by is not null', 'approved_date is not null', 'reason is null'])->toArray();

        if ($view === "modal") {
            $this->viewBuilder()->setLayout('ajax');
            $this->viewBuilder()->setTemplate($this->request->getParam('process') . '_content');
            $this->set(compact('processes', 'tableName', 'q'));
            return;
        } else if ($this->request->is('ajax')) {
            echo json_encode(array(
                "status" => 1,
                "model" => $processes
            ));
            exit;
        }

        foreach ($processes as $process) {
            $process->divided_value = null;
            if ($process->value_requests) {
                if (strpos($process->value_requests, "R$") === 0) {
                    $process->value_requests = trim(str_replace('R$', '', $process->value_requests));
                }
                if (strpos($process->value_requests, ",")) {
                    $process->value_requests = str_replace(',', '.', $process->value_requests);
                }
                $process->value_requests = (float)$process->value_requests;
                if ($process->authors) {
                    $process->divided_value = number_format($process->value_requests / $process->authors, 2, ',', '');
                }
                $process->value_requests = number_format($process->value_requests, 2, ',', '');
            }
        }
        $q_url = $this->request->getQuery('q_url', null);
        $judges = $this->Processes->Judges->find('list')->all();
        $loggedUser = $this->getLoggedUser();
        $this->set(compact('processes', 'q', 'q_url', 'judges', 'loggedUser'));
    }

    /**
     * View method
     *
     * @param string|null $id Process id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $process = $this->Processes->get($id, [
            'contain' => ['AirlineCompanies', 'Districts', 'Judges'],
        ]);

        $this->set(compact('process'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($approved = false)
    {
        $process = $this->Processes->newEmptyEntity();
        if ($this->request->is('post')) {
            $process = $this->Processes->patchEntity($process, $this->request->getData());
            $process->object_id = $this->request->getData('objective_id');
            $process->user_id = $this->getLoggedUserId();
            if ($approved) {
                $process->approved_by = $this->getLoggedUserId();;
                $process->approved_date = new FrozenDate();
            }
            if ($this->Processes->save($process)) {
                $this->Flash->success(__('The process has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The process could not be saved. Please, try again.'));
        }

        $natures = $this->Processes->Natures->find('list')->all();
        $objectives = $this->Processes->Objectives->find('list')->all();
        $casos = $this->Processes->Casos->find('list')->all();
        $airlineCompanies = $this->Processes->AirlineCompanies->find('list')->all();
        $districts = $this->Processes->Districts->find('list')->all();
        $results = $this->Processes->Results->find('list')->all();
        $types = $this->Processes->Types->find('list')->all();
        $judges = $this->Processes->Judges->find('list')->all();
        $requests = $this->Processes->Requests->find('list')->all();

        $this->set(compact('process', 'natures', 'objectives', 'casos', 'airlineCompanies', 'districts', 'results', 'types', 'judges', 'requests'));
    }

    public function import()
    {
        $process = $this->Processes->newEmptyEntity();
        if ($this->request->is('post')) {
            $uploadedFile = $this->request->getData('excel_file');
            $fileExtension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);

            if (in_array($fileExtension, ['xlsx', 'xls'])) {
                $import = $this->Processes->Imports->newEmptyEntity();
                $import->user_id = $this->getLoggedUserId();
                $spreadsheet = IOFactory::load($uploadedFile->getStream()->getMetadata('uri'));
                $import->name = $uploadedFile->getClientFilename();
                $import = $this->Processes->Imports->save($import);
                $worksheet = $spreadsheet->getActiveSheet();
                $rows = $worksheet->toArray();
                $ok = -1;
                $errados = 0;
                $total = 0;
                foreach ($rows as $row) {
                    if ($row[0] == null && $row[1] == null && $row[2] == null && $row[5] == null && $row[6] == null) {
                        break;
                    }
                    if ($ok == -1) {
                        $ok++;
                        continue;
                    }
                    $total += 1;
                    $processo = $row[0] ?? '';
                    if ($this->Processes->find()->where(['process_number' => $processo])->toArray()) {
                        continue;
                    }
                    $natureza = $row[1];
                    $objeto = $row[2];
                    $caso = $row[3] ?? 'Nenhum';
                    $descricao = $row[4];
                    $cia_aerea = $row[5];
                    $comarca = $row[6];
                    $cidade = $row[7];
                    $estado = $row[8];
                    $data = $row[9];
                    $resultado = $row[10];
                    $tipo = $row[11] ?? 'Nenhum';
                    $valor = $row[12];
                    $pedidos = $row[13] ?? 'Nenhum';
                    $juiz = $row[14];
                    $jurisprudencia = $row[15];

                    $process = $this->Processes->newEmptyEntity();
                    if ($data) {
                        $dataFiltrada = '';
                        for ($i = 0; $i < strlen($data); $i++) {
                            if (is_numeric($data[$i]) || $data[$i] == '/' || $data[$i] == '-') {
                                $dataFiltrada .= $data[$i];
                            }
                        }
                        [$dia, $mes, $ano] = explode('/', $dataFiltrada);
                        if ($mes > 12) {
                            $aux = $mes;
                            $mes = $dia;
                            $dia = $aux;
                        }
                        $data = $ano . '-' . $mes . '-' . $dia;
                        try {
                            $process->date = new FrozenDate($data);
                            $ok += 1;
                        } catch (\Exception $e) {
                            $errados += 1;
                            $total -= 1;
                            continue;
                        }
                    }

                    $process->process_number = $processo;
                    $process->description = $descricao;
                    $process->value_requests = $valor;
                    $process->jurisprudence = $jurisprudencia;

                    if ($natureza) {
                        $nature = $this->Processes->Natures->find()->where(['name' => $natureza])->first();
                        if (!$nature) {
                            $nature = $this->Processes->Natures->newEmptyEntity();
                            $nature->name = $natureza;
                            $nature = $this->Processes->Natures->save($nature);
                        }
                        $process->nature_id = $nature->id;
                    }

                    if ($objeto) {
                        $objective = $this->Processes->Objectives->find()->where(['name' => $objeto])->first();
                        $caso = $this->Processes->Casos->find()->where(['name' => $caso])->first();
                        if (!$objective || !$caso) {
                            $objective_caso = $this->Processes->Objectives->ObjectivesCasos->newEmptyEntity();
                            if (!$objective) {
                                $objective = $this->Processes->Objectives->newEmptyEntity();
                                $objective->name = $objeto;
                                $objective->nature_id = $process->nature_id;
                                $objective = $this->Processes->Objectives->save($objective);
                            }
                            $objective_caso->objective_id = $objective->id;
                            if (!$caso) {
                                $caso = $this->Processes->Casos->newEmptyEntity();
                                $caso->name = $caso;
                                $caso = $this->Processes->Casos->save($caso);
                            }
                            $objective_caso->caso_id = $caso->id;
                            $this->Processes->Objectives->ObjectivesCasos->save($objective_caso);
                        }
                        $process->object_id = $objective->id;
                        $process->caso_id = $caso->id;
                    }

                    if ($cia_aerea) {
                        $airlineCompany = $this->Processes->AirlineCompanies->find()->where(['name' => $cia_aerea])->first();
                        if (!$airlineCompany) {
                            $airlineCompany = $this->Processes->AirlineCompanies->newEmptyEntity();
                            $airlineCompany->name = $cia_aerea;
                            $this->Processes->AirlineCompanies->save($airlineCompany);
                        }
                        $process->airline_company_id = $airlineCompany->id;
                    }

                    if ($comarca) {
                        $district = $this->Processes->Districts->find()->where(['name' => $comarca])->first();
                        if (!$district) {
                            $city = $this->Processes->Districts->Cities->find()->where(['name' => $cidade])->first();
                            if (!$city) {
                                $state = $this->Processes->Districts->Cities->States->find()->where(['OR' => [['name' => $estado], ['abbreviation' => $estado]]])->first();
                                $city = $this->Processes->Districts->Cities->newEmptyEntity();
                                $city->name = $cidade;
                                $city->state_id = $state->id;
                                $this->Processes->Districts->Cities->save($city);
                            }
                            $district = $this->Processes->Districts->newEmptyEntity();
                            $district->name = $comarca;
                            $district->city_id = $city->id;
                            $this->Processes->Districts->save($district);
                        }
                        $process->district_id = $district->id;
                    }

                    if ($resultado) {
                        $result = $this->Processes->Results->find()->where(['name' => $resultado])->first();
                        if (!$result) {
                            $result = $this->Processes->Results->newEmptyEntity();
                            $result->name = $resultado;
                            $this->Processes->Results->save($result);
                        }
                        $process->result_id = $result->id;
                    }

                    $type = $this->Processes->Types->find()->where(['name' => $tipo])->first();
                    if (!$type) {
                        $type = $this->Processes->Types->newEmptyEntity();
                        $type->name = $tipo;
                        $this->Processes->Types->save($type);
                    }
                    $process->type_id = $type->id;

                    if ($juiz) {
                        $judge = $this->Processes->Judges->find()->where(['name' => $juiz])->first();
                        if (!$judge) {
                            $judge = $this->Processes->Judges->newEmptyEntity();
                            $judge->name = $juiz;
                            $this->Processes->Judges->save($judge);
                        }
                        $process->judge_id = $judge->id;
                    }

                    $request = $this->Processes->Requests->find()->where(['name' => $pedidos])->first();
                    if (!$request) {
                        $request = $this->Processes->Requests->newEmptyEntity();
                        $request->name = $pedidos;
                        $this->Processes->Requests->save($request);
                    }
                    $process->request_id = $request->id;
                    $process->user_id = $this->getLoggedUserId();
                    $process->import_id = $import->id;
                    if ($this->Processes->save($process)) {
                        $ok++;
                    }
                }
            }
            $import->total_processes = $total;
            $this->Processes->Imports->save($import);
            // debug("Processos OK: " . $ok);
            // debug("Processos Errados: " . $errados);
            // debug("Processos Totais: " . $total);
            // exit;
            if ($ok == $total) {
                $this->Flash->success(__('Todos os ' . $total . ' foram importados e salvos.'));
            } else {
                $this->Flash->error(__('Dos ' . $total . ' processos totais: ' . $ok . ' processos foram importados e salvos e ' . $errados . 'processos não conseguiram ser importados. Verifique as datas e tente novamente.'));
            }

            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('process'));
    }

    public function import2()
    {
        $eleitor = $this->Eleitores->newEmptyEntity();
        if ($this->request->is('post')) {
            $uploadedFile = $this->request->getData('import');

            if ($uploadedFile) {
                $fileExtension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
                if (in_array($fileExtension, ['xlsx', 'xls'])) {
                    $spreadsheet = IOFactory::load($uploadedFile->getStream()->getMetadata('uri'));
                    $worksheet = $spreadsheet->getActiveSheet();
                    $rows = $worksheet->toArray();

                    $successCount = 0;
                    $errorCount = 0;

                    foreach ($rows as $row) {
                        if ($row[0] != 'Nome') {
                            $entity = $this->Processes->newEmptyEntity();

                            $entity->process_number = $row[0];
                            $entity->description = $row[4];
                            $entity->date = $row[9] ? FrozenDate::createFromFormat('d/m/y', $row[9]) : null;

                            $entity->description = $row[4];

                            $nature = $this->getModel($row[1], 'Natures');
                            $entity->nature_id = $nature->id;

                            $objective = $this->getModel($row[2], 'Objectives');
                            $entity->nature_id = $objective->id;

                            $case = $this->getModel($row[3], 'Cases');
                            $entity->nature_id = $case->id;

                            $nature = $this->getModel($row[5], 'AirlineCompanies');
                            $entity->nature_id = $nature->id;

                            $district = $this->fetchTable('Districts')->find()
                                ->where(['name' => $row[6]])->first();

                            if (!$district) {
                                $state = $this->getModel($row[8], 'States');

                                $city = $this->fetchTable('Cities')->find()
                                    ->where(['name' => $row[7], 'state_id' => $state->id])
                                    ->first();

                                if (!$city) {
                                    $city = $this->Processes->Districts->Cities->newEmptyEntity();

                                    $city->name = $row[7];
                                    $city->state_id = $state->id;
                                }

                                $district = $this->Processes->Districts->newEmptyEntity();

                                $district->name = $row[6];
                                $district->city_id = $city->id;
                            }

                            $entity->district_id = $district->id;

                            $result = $this->getModel($row[10], 'Results');
                            $entity->result_id = $result->id;

                            $type = $this->getModel($row[11], 'Types');
                            $entity->type_id = $type->id;

                            $judge = $this->getModel($row[14], 'Judges');
                            $entity->judge_id = $judge->id;

                            $request = $this->getModel($row[14], 'Requests');
                            $entity->request = $request->id;

                            if ($this->Processes->save($entity)) {
                                $successCount++;
                            } else {
                                $errorCount++;
                            }
                        }
                    }
                    //                    exit;

                    if ($successCount > 0) {
                        $this->Flash->success($successCount . ' registros do arquivo Excel foram importados com sucesso.');
                    }

                    if ($errorCount > 0) {
                        $this->Flash->error($errorCount . ' registros do arquivo Excel não puderam ser importados.');
                    }
                } else {
                    $this->Flash->error('Somente arquivos Excel (.xlsx ou .xls) são permitidos.');
                }
            }

            return $this->redirect(['action' => 'index']);
        }
        $types = $this->Eleitores->Types->find('list', ['limit' => 200])->all();
        $logradouros = $this->Eleitores->Numbers->Logradouros->find('list', ['limit' => 2])->all();
        $this->set(compact('eleitor', 'types', 'logradouros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Process id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $approved = false)
    {
        $process = $this->Processes->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $process = $this->Processes->patchEntity($process, $this->request->getData());
            $process->object_id = $this->request->getData('objective_id');
            if ($this->Processes->save($process)) {
                $this->Flash->success(__('The process has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The process could not be saved. Please, try again.'));
        }

        $natures = $this->Processes->Natures->find('list')->all();
        $objectives = $this->Processes->Objectives->find('list')->all();
        $casos = $this->Processes->Casos->find('list')->all();
        $airlineCompanies = $this->Processes->AirlineCompanies->find('list')->all();
        $districts = $this->Processes->Districts->find('list')->all();
        $results = $this->Processes->Results->find('list')->all();
        $types = $this->Processes->Types->find('list')->all();
        $judges = $this->Processes->Judges->find('list')->all();
        $requests = $this->Processes->Requests->find('list')->all();

        $this->set(compact('process', 'natures', 'objectives', 'casos', 'airlineCompanies', 'districts', 'results', 'types', 'judges', 'requests'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Process id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $process = $this->Processes->get($id);
        if ($this->Processes->delete($process)) {
            $this->Flash->success(__('The process has been deleted.'));
        } else {
            $this->Flash->error(__('The process could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function evaluate($id = null)
    {
        $processes = $this->Processes->find()->contain([
            'Natures',
            'Objectives',
            'Casos',
            'AirlineCompanies',
            'Districts',
            'Districts.Cities',
            'Districts.Cities.States',
            'Results',
            'Types',
            'Judges',
            'Requests',
        ])->where(['approved_by is null', 'approved_date is null']);

        foreach ($processes as $process) {
            $process->divided_value = null;
            if ($process->value_requests) {
                if (strpos($process->value_requests, "R$") === 0) {
                    $process->value_requests = trim(str_replace('R$', '', $process->value_requests));
                }
                if (strpos($process->value_requests, ",")) {
                    $process->value_requests = str_replace(',', '.', $process->value_requests);
                }
                $process->value_requests = (float)$process->value_requests;
                if ($process->authors) {
                    $process->divided_value = number_format($process->value_requests / $process->authors, 2, ',', '');
                }
                $process->value_requests = number_format($process->value_requests, 2, ',', '');
            }
        }

        $this->set(compact('processes'));
    }

    public function approve($id = null)
    {
        $process = $this->Processes->get($id);
        $process->reason = null;
        $process->approved_by = $this->getLoggedUserId();
        $process->approved_date = new FrozenDate();
        if ($this->Processes->save($process)) {
            $this->Flash->success(__('O processo ' . $process->process_number . ' foi aprovado.'));
        } else {
            $this->Flash->error(__('O processo ' . $process->process_number . ' não conseguiu ser aprovado.'));
        }
        return $this->redirect(['action' => 'evaluate']);
    }

    public function negate($id = null)
    {
        $process = $this->Processes->get($id);
        $process->reason = $this->request->getData('reason');
        $process->approved_by = $this->getLoggedUserId();
        $process->approved_date = new FrozenDate();
        if ($this->Processes->save($process)) {
            $msg = __('O processo ' . $process->process_number . ' foi negado e a avaliação foi enviada para o usuário.');
        } else {
            $msg = __('O processo ' . $process->process_number . ' não conseguiu ser negado.');
        }
        $responseData = [
            "status" => 1,
            'message' => $msg,
        ];
        echo json_encode($responseData);
        exit;
    }

    public function getModel($row, $table)
    {
        $entity = $this->fetchTable($table)->find()->where(['name' => $row])->first();

        if (!$entity) {
            $entity = $this->fetchTable($table)->newEmptyEntity();
            $entity->name = $row;

            $this->fetchTable($table)->save($entity);
        }

        return $entity;
    }

    public function getObjectives($nature_id, $objective_id = null)
    {
        $this->viewBuilder()->setLayout('ajax');

        $objectives = $this->Processes->Natures->Objectives->find('list')->where(['nature_id' => $nature_id])->toArray();

        $this->set(compact('objectives', 'objective_id'));
    }

    public function getCasos($objective_id, $caso_id = null)
    {
        $this->viewBuilder()->setLayout('ajax');

        $c = $this->Processes->Objectives->ObjectivesCasos->find()
            ->contain('Casos')
            ->where(['ObjectivesCasos.objective_id' => $objective_id])
            ->select(['Casos.id', 'Casos.name'])
            ->toArray();

        $casos = [];
        foreach ($c as $caso) {
            $casos[$caso->caso->id] = $caso->caso->name;
        }

        $this->set(compact('casos', 'caso_id'));
    }

    public function searchProcesses(): array
    {
        $q = $this->Processes->newEmptyEntity();
        $data = $this->request->getQuery();
        $q = $this->Processes->patchEntity($q, $data);

        $processes = $this->Processes->find()->contain([
            'Natures',
            'Objectives',
            'Casos',
            'AirlineCompanies',
            'Districts',
            'Districts.Cities',
            'Districts.Cities.States',
            'Results',
            'Types',
            'Judges',
            'Requests',
        ]);

        if ($q->judge_id)
            $processes->andWhere(['Processes.judge_id' => $q->judge_id]);

        $q->user_id = $this->getLoggedUserId();

        return array($processes, $q);
    }
}
