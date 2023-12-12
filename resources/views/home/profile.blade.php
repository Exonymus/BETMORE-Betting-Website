@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}"/>
@endsection

@section('scripts')
    <script type="module" src="{{asset('js/profile.js')}}"></script>
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
                                             src="{{asset("img/logos/default-avatar.jpeg")}}"
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
                                        Exonymus</h4>
                                    <div class="level-section">
                                        <h3 class="mb-0 level-name">Level: <b id="user-level">5</b>
                                        </h3>
                                        <span class="percentage">90%</span>
                                        <div class="cover">
                                            <div class="progressbar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center text-sm-right">
                                    <div class="text-muted" id="join-date"><small>Joined 09.01.2023</small>
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
                        </ul>
                        <div class="tab-content pt-3" id="profile-tabs_content">
                            <div class="tab-pane fade show active"
                                 id="profile-settings"
                                 role="tabpanel"
                                 aria-labelledby="profile-settings__tab">
                                <form class="form row justify-content-around">
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
                                                               placeholder="Exonymus"
                                                               value="Exonymus"
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
                                                           class="form-control"
                                                           type="text"
                                                           placeholder="user@example.com"
                                                           value="user@example.com" required>
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
                                                    <span id="current-debt"></span>
                                                </p>
                                                <p class="settings-subcategory">
                                                    <i>Days to pay:</i>
                                                    <span id="days-to-pay">5</span>
                                                </p>
                                                <p class="settings-subcategory">
                                                    <i>Available amount:</i>
                                                    <span id="available-amount"></span>
                                                </p>
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
                                                            <li class="list-group-item">
                                                                <div class="bet-date">10.10.2023</div>
                                                                <div class="bet-sum__lose">1000 coins taken</div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="dbet-date">10.10.2023</div>
                                                                <div class="bet-sum__return">1000 coins returned</div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="dbet-date">10.10.2023</div>
                                                                <div class="bet-sum__return">500 coins returned</div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="bet-date">10.10.2023</div>
                                                                <div class="bet-sum__lose">1000 coins taken</div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="dbet-date">10.10.2023</div>
                                                                <div class="bet-sum__return">1000 coins returned</div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="bet-date">10.10.2023</div>
                                                                <div class="bet-sum__lose">1000 coins taken</div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="dbet-date">10.10.2023</div>
                                                                <div class="bet-sum__return">1000 coins returned</div>
                                                            </li>

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
