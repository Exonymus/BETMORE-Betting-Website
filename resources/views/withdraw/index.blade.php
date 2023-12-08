@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/withdraw.css')}}"/>
@endsection

@section('title')
    <title>Withdraw - BETMORE</title>
@endsection

@section('scripts')
    <script>
        document.getElementById('coinsWithdraw').addEventListener('blur', function () {
            const amountBYN = document.getElementById('coinsWithdraw').value;
            if (amountBYN < 500) {
                document.getElementById('coinsWithdraw').value = 500;
            }
            if (amountBYN > 20000) {
                document.getElementById('coinsWithdraw').value = 20000;
            }
            calculateCoins();
        });
        function calculateCoins() {
            const coins = document.getElementById('coinsWithdraw').value;
            const withdrawByn = parseInt(coins) * 90 / 100 / 100;
            document.getElementById('amountBYN').value = withdrawByn.toFixed(2);
        }
    </script>
@endsection

@section('content')

    <main class="page__main page-withdraw__main">
        <!-- withdraw Form -->
        <section class="withdraw-form__wrapper">
            <form class="withdraw-form" id="withdrawForm" action="{{ route('withdraw.request') }}" method="post">
                @csrf
                <h2 class="withdraw__heading">GET FUNDS</h2>
                <div class="form-group withdraw-input">
                    <label class="withdraw-input__label" for="coinsWithdraw">You Pay:</label>
                    <input type="number"
                           class="form-control withdraw-input__number"
                           id="coinsWithdraw"
                           name="coinsWithdraw"
                           min="500" max="20000" step="100"
                           value="500"
                           required>
                    <img class="withdraw-detail" src="img/logos/coin.svg" alt="Coins">
                </div>
                <div class="form-group withdraw-result">
                    <label class="withdraw-input__label" for="amountBYN">You Get:</label>
                    <input type="text"
                           class="form-control withdraw-input__number"
                           id="amountBYN"
                           name="amountBYN"
                           value="4.50"
                           readonly>
                    <label class="withdraw-detail withdraw-sum">BYN</label>
                </div>
                <button class="form__submit-btn" type="submit">
                    <b class="submit-btn__text">Withdraw</b>
                </button>
            </form>
        </section>

        <!-- withdraw History -->
        <section class="withdraw-history">
            <div class="card">
                <h2 class="card-header history-card__header">Withdraw History</h2>
                <div class="card-body history-card__content">
                    <div>
                        <ul id="historyList" class="list-group">
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="withdraw-date">10.10.2023</div>
                                <div class="withdraw-sum">⬆1000 coins (100 BYN)</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
