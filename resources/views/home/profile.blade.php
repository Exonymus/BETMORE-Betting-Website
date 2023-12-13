@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}"/>
@endsection

@section('title')
    <title>{{$user->name}} - BETMORE</title>
@endsection

@section('content')
    <main class="page__main page-profile__main">
        <!-- Profile Section -->
        <section class="profile column justify-content-center">
            <div class="card" id="profile-card">
                <div class="card-body">
                    <div class="e-profile">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                                <div class="mx-auto" id="avatar-container-wrapper">
                                    <div class="d-flex justify-content-center align-items-center rounded"
                                         id="avatar-container">
                                        <img id="avatar-img"
                                             src="{{asset('storage/' . $user->avatar)}}"
                                             alt="avatar"
                                             class="rounded">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-primary" type="button"
                                            id="upload-avatar-btn">
                                        <i class="fa fa-fw fa-camera"></i>
                                        <span>Change Photo</span>
                                        <input class="d-none" type="file" accept="image/*"
                                               id="upload-avatar-inp">
                                    </button>
                                </div>
                            </div>
                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-2 mb-sm-0" id="profile-header">
                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap username">
                                        {{$user->name}}</h4>
                                    <div class="level-section">
                                        <h3 class="mb-0 level-name">Level: <b id="user-level">0</b>
                                        </h3>
                                        <span class="percentage">0%</span>
                                        <div class="cover">
                                            <div class="progressbar" style="width: 0;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center text-sm-right">
                                    <div class="text-muted" id="join-date"><small>Joined {{substr($user->created_at, 0, 10)}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="profile-tabs">
                            <li class="nav-item">
                                <a class="nav-link tab-ref active" role="tab"
                                   id="profile-settings__tab"
                                   data-bs-toggle="tab" data-bs-target="#profile-settings"
                                   aria-controls="profile-settings"
                                   aria-selected="true">Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tab-ref" role="tab"
                                   id="debts-settings__tab"
                                   data-bs-toggle="tab" data-bs-target="#debts-settings"
                                   aria-controls="debts-settings">Debts</a>
                            </li>
                            <li>
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </li>
                        </ul>
                        <div class="tab-content pt-3" id="profile-tabs_content">
                            <div class="tab-pane fade show active"
                                 id="profile-settings"
                                 role="tabpanel"
                                 aria-labelledby="profile-settings__tab">
                                <form action="{{ route('home.profile.update') }}" method="post" enctype="multipart/form-data" class="form row justify-content-around">
                                    @csrf
                                    <div class="column user-setts">
                                        <div class="mb-2 settings-category"><b>User Settings</b></div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label class="settings-subcategory"
                                                               for="inp_username">Username</label>
                                                        <input id="inp_username"
                                                               class="form-control"
                                                               type="text" name="username"
                                                               placeholder="{{$user->name}}"
                                                               value="{{$user->name}}"
                                                               minlength="5"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="form-group">
                                                    <label class="settings-subcategory"
                                                           for="inp_email">Email</label>
                                                    <input id="inp_email"
                                                           name="inp_email"
                                                           class="form-control"
                                                           type="text"
                                                           placeholder="{{$user->email}}"
                                                           value="{{$user->email}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column pass-setts">
                                        <div class="mb-2 settings-category"><b>Password Settings</b></div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label class="settings-subcategory"
                                                               for="inp_pass--cur">Current Password</label>
                                                        <input id="inp_pass--cur"
                                                               name="inp_pass--cur"
                                                               class="form-control"
                                                               type="password"
                                                               placeholder="••••••••"
                                                               minlength="8"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <div class="form-group">
                                                        <label class="settings-subcategory"
                                                               for="inp_pass--new">New Password</label>
                                                        <input id="inp_pass--new"
                                                               name="inp_pass--new"
                                                               class="form-control"
                                                               type="password"
                                                               placeholder="••••••••"
                                                               minlength="8">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-center">
                                            <button class="form__submit-btn" type="submit">
                                                <b class="submit-btn__text">Save
                                                    Changes</b>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade" id="debts-settings" role="tabpanel"
                                 aria-labelledby="debts-settings__tab">
                                <div class="justify-content-around" id="d-tab">
                                    <div class="column debts-setts">
                                        <div class="col mb-3">
                                            <div class="mb-2 settings-category"><b>Debts Settings</b></div>
                                            <div class="user-credit-info">
                                                <p class="settings-subcategory">
                                                    <i>Current debt:</i>
                                                    <span id="current-debt">{{ $user->loans()->where('action', 'take')->sum('amount') - $user->loans()->where('action', 'return')->sum('amount') }}</span>
                                                </p>
                                                <p class="settings-subcategory">
                                                    <i>Days to pay:</i>
                                                    <span id="days-to-pay">infinite</span>
                                                </p>
                                                <p class="settings-subcategory">
                                                    <i>Available amount:</i>
                                                    <span id="available-amount">infinite</span>
                                                </p>s
                                            </div>
                                            <div class="row justify-content-around debt-buttons">
                                                <button class="btn btn-primary debt-button"
                                                        id="take-credit-btn">Take Credit
                                                </button>
                                                <button class="btn btn-danger debt-button"
                                                        id="pay-debt-btn">Pay Debt
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column debts-setts">
                                        <div class="mb-2 settings-category">
                                            <b>Debts History</b>
                                        </div>
                                        <!-- История долгов -->
                                        <section class="debt-history">
                                            <div class="card" id="debt-history">
                                                <div class="card-body history-card__content">
                                                    <div>
                                                        <ul class="list-group">
                                                            @foreach($user->loans as $loan)
                                                                <li class="list-group-item">
                                                                    <div class="bet-date">{{substr($loan->created_at, 0, 10)}}</div>
                                                                    <div class="{{$loan->action == 'take' ? 'bet-sum__lose' : 'bet-sum__return' }}">{{$loan->amount}} coins {{$loan->action == 'take' ? 'taken' : 'returned' }}</div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bet History Section -->
        <section class="bet-history">
            <div class="card" id="bet-history">
                <h2 class="card-header history-card__header">Bets History</h2>
                <div class="card-body history-card__content">
                    <div>
                        <ul id="historyList" class="list-group">
                            @foreach($user->bets as $bet)
                                <li class="list-group-item">
                                    <div class="bet-date">{{$bet->created_at}}</div>
                                    @if (!$bet->match->results)
                                        @if ($bet->insured == 0)
                                            <div class="">{{$bet->amount}} coins (x{{$bet->coefficient}})</div>
                                        @else
                                            <div class="">{{$bet->amount}} coins (x{{$bet->coefficient}}) | {{$bet->amount}} nolos</div>
                                        @endif
                                    @elseif ($bet->match->results == $bet->team->name)
                                        @if ($bet->insured == 0)
                                            <div class="bet-sum__win">+{{$bet->amount}} coins (x{{$bet->coefficient}}) | +{{$bet->amount / 10}} nolos</div>
                                        @else
                                            <div class="bet-sum__win">+{{$bet->amount}} coins (x{{$bet->coefficient}})</div>
                                        @endif
                                    @else
                                        @if ($bet->insured == 0)
                                            <div class="bet-sum__lose">-{{$bet->amount}} coins (x{{$bet->coefficient}})</div>
                                        @else
                                            <div class="bet-sum__return">{{$bet->amount}} coins (x{{$bet->coefficient}}) | -{{$bet->amount}} nolos</div>
                                        @endif
                                    @endif
                                </li>
                            @endforeach
                            <li class="list-group-item">
                                <div class="bet-date">10.10.2023</div>
                                <div class="bet-sum__win">+1000 coins (x2.5) | +100 nolos</div>
                            </li>
                            <li class="list-group-item">
                                <div class="dbet-date">10.10.2023</div>
                                <div class="bet-sum__return">500 coins (x1.5) | -500 nolos</div>
                            </li>
                            <li class="list-group-item">
                                <div class="bet-date">10.10.2023</div>
                                <div class="bet-sum__lose">-500 coins (x1.8)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="bet-date">10.10.2023</div>
                                <div class="bet-sum__win">+1000 coins (x2.5) | +100 nolos</div>
                            </li>
                            <li class="list-group-item">
                                <div class="dbet-date">10.10.2023</div>
                                <div class="bet-sum__return">500 coins (x1.5) | -500 nolos</div>
                            </li>
                            <li class="list-group-item">
                                <div class="bet-date">10.10.2023</div>
                                <div class="bet-sum__lose">-500 coins (x1.8)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="bet-date">10.10.2023</div>
                                <div class="bet-sum__win">+1000 coins (x2.5) | +100 nolos</div>
                            </li>
                            <li class="list-group-item">
                                <div class="dbet-date">10.10.2023</div>
                                <div class="bet-sum__return">500 coins (x1.5) | -500 nolos</div>
                            </li>
                            <li class="list-group-item">
                                <div class="bet-date">10.10.2023</div>
                                <div class="bet-sum__lose">-500 coins (x1.8)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="dbet-date">10.10.2023</div>
                                <div class="bet-sum__return">500 coins (x1.5) | -500 nolos</div>
                            </li>
                            <li class="list-group-item">
                                <div class="bet-date">10.10.2023</div>
                                <div class="bet-sum__lose">-500 coins (x1.8)</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        document.getElementById('upload-avatar-btn').addEventListener("click", function () {
            document.getElementById('upload-avatar-inp').click();
        });
        document.getElementById('upload-avatar-inp').onchange = function () {
            document.getElementById('avatar-img').src =
                URL.createObjectURL(document.getElementById('upload-avatar-inp').files[0]);
        };

        function setLevel(xp) {
            let level = (xp / 5000).toFixed(0);
            let exp = (xp % 5000) / 5000;
            document.getElementById('user-level').innerText = level.toString();
            document.querySelector('.percentage').innerHTML = `${exp * 100}%`;
            document.querySelector('.cover .progressbar').style.width = `${exp * 100}%`;
        }

        $("#take-credit-btn").click(function () {
            var amountToTake = prompt("Enter the amount to take in credit:");
            amountToTake = parseInt(amountToTake);

            if (amountToTake > 0 && amountToTake <= {{(int)($user->exp / 5000) * 1000}}) {

                const debtData = new FormData();
                debtData.append('amount', amountToTake);
                debtData.append('_token', '{{ csrf_token() }}');

                // Process taking credit (you may need to implement this logic)
                $.ajax({
                    url: '{{ route("home.profile.debt") }}',
                    method: 'POST',
                    data: debtData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        location.reload();
                        document.querySelector('#debts-settings__tab').click();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                alert("Invalid credit amount!");
            }
        });

        $("#pay-debt-btn").click(function () {
            var amountToTake = prompt("Enter the amount to return in credit:");
            amountToTake = parseInt(amountToTake);

            if (amountToTake > 0) {

                const debtData = new FormData();
                debtData.append('amount', amountToTake);
                debtData.append('_token', '{{ csrf_token() }}');

                // Process taking credit (you may need to implement this logic)
                $.ajax({
                    url: '{{ route("home.profile.debt.pay") }}',
                    method: 'POST',
                    data: debtData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        location.reload();
                        document.querySelector('#debts-settings__tab').click();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                alert("Invalid credit amount!");
            }
        });

        document.getElementById('upload-avatar-inp').addEventListener('change', function () {
            const fileInput = this;

            // Check if a file is selected
            if (fileInput.files.length > 0) {
                const formData = new FormData();
                formData.append('avatar', fileInput.files[0]);
                formData.append('_token', '{{ csrf_token() }}');

                // Use AJAX to send the file to the controller
                $.ajax({
                    url: '{{ route("home.profile.update-avatar") }}',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Update the avatar image on success
                        $('#avatar-img').attr('src', response.avatarUrl);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        setTimeout(() => {
            setLevel({{$user->exp}});
        }, 1000);
    </script>
@endsection
