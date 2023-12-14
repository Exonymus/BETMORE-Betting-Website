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
    @if ($errors->any())
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Display the toast
                var toast = new bootstrap.Toast(document.getElementById('error-toast'));
                toast.show();

                // Hide the toast after 15 seconds
                setTimeout(function () {
                    toast.hide();
                }, 15000);
            });
        </script>
    @endif
@endsection

@section('toast')
    @if ($errors->any())
        <div id="error-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body" style="background-color: darkred;">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: white;">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif
@endsection

@section('content')
    <main class="page__main page-deposit__main">
        <!-- Deposit Form -->
        <section class="deposit-form__wrapper">
            <form class="deposit-form" id="depositForm" action="{{ route('deposit.deposit') }}" method="post">
                @csrf
                <h2 class="deposit__heading">ADD FUNDS</h2>
                <div class="form-group deposit-input">
                    <label class="deposit-input__label" for="amountBYN">You Pay:</label>
                    <input type="number"
                           class="form-control deposit-input__number"
                           id="amountBYN"
                           name="amountBYN"
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
                           name="coinsBonus"
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
                            @foreach($deposits as $deposit)
                                <li class="list-group-item">
                                    <div class="deposit-date">{{$deposit->created_at}}</div>
                                    <div class="deposit-sum">⬇{{round($deposit->amount / 110, 2)}} BYN (+{{$deposit->amount}} coins)</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
