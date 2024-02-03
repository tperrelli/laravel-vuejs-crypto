<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoinDetailResource;
use Illuminate\Http\Request;
use App\Http\Resources\CoinResource;
use App\Repositories\CoinRepository;

class CoinController extends Controller
{
    /** @var CoinRepository $repository */
    protected $repository;

    /**
     * Class constructor
     * 
     * @param CoinRepository $repository
     */
    public function __construct(CoinRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Lists an application resource
     * 
     * @param Request $request
     * @param int $perPage
     */
    public function index(Request $request, int $perPage = 10)
    {
        $request->validate([
            'vs_currency' => 'required',
        ]);

        $params = $request->merge(['per_page' => $perPage]);
        
        return CoinResource::collection(
            $this->repository->getAll($params->all())
        );
    }
    
    /**
     * Finds an application resource
     * 
     * @param string $id
     * @param CoinDetailResource
     */
    public function find(string $id): CoinDetailResource
    {
        return new CoinDetailResource(
            $this->repository->find($id)
        );
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
