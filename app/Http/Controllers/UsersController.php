<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Contracts\UserRepository;
use App\Validators\UserValidator;

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
     * Validator
     *
     * @var UserValidator
     */
    protected $validator;

    /**
     * UserController construct
     *
     * @param App\Repositories\Contracts\UserRepository $repository UserRepository
     * @param App\Validators\UserValidator              $validator  UserValidator
     *
     * @return void
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
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
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $user = $this->repository->create($request->all());

            $response = [
                'message' => 'User created.',
                $user
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
        } catch (ValidatorException $e) {
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
        //
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
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $user = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'User updated.',
                'data'    => $user->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
        } catch (ValidatorException $e) {
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
