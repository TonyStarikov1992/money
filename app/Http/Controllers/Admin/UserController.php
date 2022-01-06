<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return  view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $names = [
            'Tony',
            'John',
            'Lee',
            'Tom',
            'Bill',
        ];

        $surnames = [
            'Dou',
            'Smith',
            'Watson',
            'Johnson',
            'Oldman',
        ];

        $countries = [
            'Russia',
            'Byelorussia',
            'Kazakhstan',
            'Lithuanian',
            'Estonia',
        ];

        $days = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19',
            '20',
            '21',
            '22',
            '23',
            '24',
            '25',
            '26',
            '27',
            '28',
            '29',
        ];

        $months = [
            '01',
            '02',
            '03',
            '04',
            '05',
            '06',
            '07',
            '08',
            '09',
            '10',
            '11',
            '12',
        ];

        $years = [
            '1960',
            '1961',
            '1962',
            '1963',
            '1964',
            '1965',
            '1966',
            '1967',
            '1968',
            '1969',
            '1970',
            '1971',
            '1972',
            '1973',
            '1974',
            '1975',
            '1976',
            '1977',
            '1978',
            '1979',
            '1980',
            '1981',
            '1982',
            '1983',
            '1984',
            '1985',
            '1986',
            '1987',
            '1988',
            '1989',
            '1990',
            '1991',
            '1992',
            '1993',
            '1994',
            '1995',
            '1996',
            '1997',
            '1998',
            '1999',
            '2000',
            '2001',
            '2002',
        ];

        $timezones = [
            '10',
            '9',
            '8',
            '7',
            '6',
            '5',
            '4',
            '3',
            '2',
            '1',
            '0',
            '-1',
            '-2',
            '-3',
            '-4',
            '-5',
            '-6',
            '-7',
            '-8',
            '-9',
            '-10',
        ];

        $name = $names[array_rand($names)];

        $lower_case_name = mb_strtolower($name);

        $surname = $surnames[array_rand($surnames)];

        $lower_case_surname = mb_strtolower($surname);

        $country = $countries[array_rand($countries)];

        $day = $days[array_rand($days)];
        $month = $months[array_rand($months)];
        $year = $years[array_rand($years)];

        $birthday = $day . '.' . $month . '.' . $year;

        $timezone = $timezones[array_rand($timezones)];

        $email = $lower_case_name . '.' . $lower_case_surname . '.' . $year . '@gmail.com';

        $phone = '+38063' . $year . $day . $month;

        return view('admin.users.create', compact('name', 'surname', 'country', 'birthday', 'timezone', 'email', 'phone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = $request->all();

        $parameters['password'] = bcrypt($parameters['password']);

        $parameters['is_bot'] = 1;

        $parameters['register_time'] = time();

        User::create($parameters);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user->status == 0) {
            $parameters['status'] = 1;
        } else {
            $parameters['status'] = 0;
        }

        $user->update($parameters);

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return  view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $parameters = $request->all();

        if ($user->password != $request->password) {
            $parameters['password'] = bcrypt($parameters['password']);
        }

        $user->update($parameters);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
