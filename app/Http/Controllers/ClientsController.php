<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{
    /**
     * @var ClientService
     */
    private $clientService;
    /**
     * @var ClientRepository
     */
    private $repository;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->clientService = $clientService;
        $this->repository = $repository;
    }

    public function index()
    {

        $clients = $this->repository->paginate(5);

        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request)
    {
        $data = $request->all();
        $this->clientService->create($data);
        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->repository->find($id);

        return view('admin.clients.edit', compact('client'));
    }

    public function update(AdminClientRequest $request, $id)
    {
        $data = $request->all();
        $this->clientService->update($data, $id);

        return redirect()->route('admin.clients.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('admin.clients.index');
    }
}
