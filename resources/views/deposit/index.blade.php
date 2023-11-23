@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/deposit.css')}}"/>
@endsection

@section('title')
    <title>Deposit - BETMORE</title>
@endsection

@section('scripts')
    <script>
        document.getElementById('amountBYN').addEventListener('input', function () {
            const amountBYN = document.getElementById('amountBYN').value;
            if (amountBYN < 5) {
                document.getElementById('amountBYN').value = 5
            }
            if (amountBYN > 100) {
                document.getElementById('amountBYN').value = 100
            }
            calculateCoins();
        });
        function calculateCoins() {
            const amountBYN = document.getElementById('amountBYN').value;
            const coinsBonus = parseInt(amountBYN) * 10 / 100; // 10% бонус
            const totalCoins = (parseInt(amountBYN) + coinsBonus) * 100;
            document.getElementById('coinsBonus').value = totalCoins.toFixed(0);
        }
    </script>
@endsection

@section('content')
    <main class="page__main page-deposit__main">
        <!-- Deposit Form -->
        <section class="deposit-form__wrapper">
            <form class="deposit-form" id="depositForm">
                <h2 class="deposit__heading">ADD FUNDS</h2>
                <div class="form-group deposit-input">
                    <label class="deposit-input__label" for="amountBYN">You Pay:</label>
                    <input type="number"
                           class="form-control deposit-input__number"
                           id="amountBYN"
                           min="5" max="100" step="1"
                           value="5"
                           required>
                    <label class="deposit-detail deposit-sum">BYN</label>
                </div>
                <div class="form-group deposit-result">
                    <label class="deposit-input__label" for="coinsBonus">You Get:</label>
                    <input type="text"
                           class="form-control deposit-input__number"
                           id="coinsBonus"
                           value="550"
                           readonly>
                    <img class="deposit-detail" src="img/logos/coin.svg" alt="Coins">
                </div>
                <button class="form__submit-btn" type="submit">
                    <b class="submit-btn__text">Deposit</b>
                </button>
            </form>
        </section>

        <!-- Deposit History -->
        <section class="deposit-history">
            <div class="card">
                <h2 class="card-header history-card__header">Deposit History</h2>
                <div class="card-body history-card__content">
                    <div>
                        <ul id="historyList" class="list-group">
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                            <li class="list-group-item">
                                <div class="deposit-date">10.10.2023</div>
                                <div class="deposit-sum">⬇100 BYN (+110 coins)</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
