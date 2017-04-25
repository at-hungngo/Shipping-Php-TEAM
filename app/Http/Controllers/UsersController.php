<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Contracts\UserRepository;

use App\Models\Role;

class UsersController extends Controller
{

    /**
     * Repository
     *
     * @var UserRepository
     */
    protected $repository;

    /**
     * UserController construct
     *
     * @param App\Repositories\Contracts\UserRepository $repository UserRepository
     *
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $users = $this->repository->all();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        try {
            $user = $this->repository->create($request->all());

            $response = [
                'message' => 'User created.',
                $user
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
        } catch (Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id User id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {
            return response()->json([
                $user,
            ]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id User id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request Request
     * @param string            $id      User id
     *
     * @return Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

        try {
            $user = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'User updated.',
                $user,
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
        } catch (Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id User id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }
    }
}
