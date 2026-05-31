<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1><i class="fas fa-credit-card"></i> Payment Center</h1>
    <p class="date-text">Manage and track your tuition payments</p>
</div>

<!-- Summary Cards -->
<div class="payment-summary">
    <div class="pay-card pay-total">
        <div class="pay-card-icon"><i class="fas fa-file-invoice-dollar"></i></div>
        <div class="pay-card-info">
            <span class="pay-label">Total Tuition</span>
            <span class="pay-amount">₱<?= number_format($total_tuition, 2) ?></span>
            <span class="pay-sub">Full semester fee</span>
        </div>
    </div>
    <div class="pay-card pay-paid">
        <div class="pay-card-icon"><i class="fas fa-check-circle"></i></div>
        <div class="pay-card-info">
            <span class="pay-label">Total Paid</span>
            <span class="pay-amount">₱<?= number_format($total_paid, 2) ?></span>
            <span class="pay-sub"><?= count(array_filter($schedule, fn($s) => $s['status']==='Paid')) ?> of <?= count($schedule) ?> installments</span>
        </div>
    </div>
    <div class="pay-card pay-remaining">
        <div class="pay-card-icon"><i class="fas fa-hourglass-half"></i></div>
        <div class="pay-card-info">
            <span class="pay-label">Remaining Balance</span>
            <span class="pay-amount">₱<?= number_format($remaining, 2) ?></span>
            <span class="pay-sub">
                <?= $remaining > 0 ? round(($remaining / $total_tuition) * 100) . '% remaining' : 'Fully paid!' ?>
            </span>
        </div>
    </div>
</div>

<form action="<?= base_url('payment/process') ?>" method="POST" id="paymentForm">
<?= csrf_field() ?>

<div class="payment-layout">

    <!-- LEFT: Schedule Table -->
    <div class="payment-left">
        <div class="settings-card">
            <h3 style="margin-bottom:18px"><i class="fas fa-calendar-alt" style="color:var(--accent)"></i> Payment Schedule</h3>
            <div class="table-wrapper" style="border:none;background:transparent;margin:0">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width:44px;text-align:center">Select</th>
                            <th>Month</th>
                            <th>Due Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Paid On</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($schedule as $s): ?>
                    <tr class="pay-row <?= $s['status']==='Paid' ? 'pay-row-done' : 'pay-row-pending' ?>"
                        onclick="<?= $s['status']!=='Paid' ? 'toggleCheck(this)' : '' ?>">
                        <td style="text-align:center">
                            <?php if($s['status'] !== 'Paid'): ?>
                            <input type="checkbox"
                                   name="selected_payments[]"
                                   value="<?= $s['id'] ?>"
                                   class="pay-check"
                                   data-amount="<?= $s['amount'] ?>"
                                   data-month="<?= esc($s['month_label']) ?>"
                                   onclick="event.stopPropagation()">
                            <?php else: ?>
                            <div class="paid-check-icon"><i class="fas fa-check"></i></div>
                            <?php endif; ?>
                        </td>
                        <td style="font-weight:600"><?= esc($s['month_label']) ?></td>
                        <td style="color:var(--text-muted)"><?= date('M d, Y', strtotime($s['due_date'])) ?></td>
                        <td style="font-weight:700">₱<?= number_format($s['amount'], 2) ?></td>
                        <td>
                            <span class="badge <?= $s['status']==='Paid' ? 'badge-green' : ($s['status']==='Overdue' ? 'badge-red' : 'badge-yellow') ?>">
                                <?= $s['status'] ?>
                            </span>
                        </td>
                        <td style="color:var(--text-muted);font-size:13px">
                            <?= $s['paid_date'] ? date('M d, Y', strtotime($s['paid_date'])) : '—' ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- RIGHT: Summary + Payment Methods -->
    <div class="payment-right">

        <!-- Order Summary -->
        <div class="settings-card pay-summary-box">
            <h3><i class="fas fa-receipt" style="color:var(--accent)"></i> Order Summary</h3>
            <div id="summaryEmpty" class="summary-empty">
                <i class="fas fa-hand-pointer"></i>
                <p>Select installments from the table to see your total here.</p>
            </div>
            <div id="summaryList" style="display:none">
                <div class="summary-items" id="summaryItems"></div>
                <div class="summary-divider"></div>
                <div class="summary-total-row">
                    <span>Total to Pay</span>
                    <span id="totalDisplay" class="summary-total-amt">₱0.00</span>
                </div>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="settings-card">
            <h3 style="margin-bottom:16px"><i class="fas fa-wallet" style="color:var(--accent)"></i> Payment Method</h3>
            <div class="pay-methods-grid">

                <label class="pay-method-card">
                    <input type="radio" name="payment_method" value="GCash">
                    <div class="pay-method-inner">
                        <div class="method-logo gcash-logo">G</div>
                        <div class="method-info">
                            <span class="method-name">GCash</span>
                            <span class="method-desc">Mobile wallet</span>
                        </div>
                        <div class="method-check"><i class="fas fa-check-circle"></i></div>
                    </div>
                    <button type="submit" class="method-pay-btn" onclick="setMethod('GCash')">
                        Pay Now <i class="fas fa-arrow-right"></i>
                    </button>
                </label>

                <label class="pay-method-card">
                    <input type="radio" name="payment_method" value="Maya">
                    <div class="pay-method-inner">
                        <div class="method-logo maya-logo">M</div>
                        <div class="method-info">
                            <span class="method-name">Maya</span>
                            <span class="method-desc">Digital payments</span>
                        </div>
                        <div class="method-check"><i class="fas fa-check-circle"></i></div>
                    </div>
                    <button type="submit" class="method-pay-btn" onclick="setMethod('Maya')">
                        Pay Now <i class="fas fa-arrow-right"></i>
                    </button>
                </label>

                <label class="pay-method-card">
                    <input type="radio" name="payment_method" value="DragonPay">
                    <div class="pay-method-inner">
                        <div class="method-logo dragon-logo">D</div>
                        <div class="method-info">
                            <span class="method-name">DragonPay</span>
                            <span class="method-desc">Online banking</span>
                        </div>
                        <div class="method-check"><i class="fas fa-check-circle"></i></div>
                    </div>
                    <button type="submit" class="method-pay-btn" onclick="setMethod('DragonPay')">
                        Pay Now <i class="fas fa-arrow-right"></i>
                    </button>
                </label>

                <label class="pay-method-card">
                    <input type="radio" name="payment_method" value="7-Eleven">
                    <div class="pay-method-inner">
                        <div class="method-logo seven-logo">7</div>
                        <div class="method-info">
                            <span class="method-name">7-Eleven</span>
                            <span class="method-desc">Over-the-counter</span>
                        </div>
                        <div class="method-check"><i class="fas fa-check-circle"></i></div>
                    </div>
                    <button type="submit" class="method-pay-btn" onclick="setMethod('7-Eleven')">
                        Pay Now <i class="fas fa-arrow-right"></i>
                    </button>
                </label>

            </div>
        </div>
    </div>
</div>
</form>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
function toggleCheck(row) {
    const cb = row.querySelector('.pay-check');
    if(cb) { cb.checked = !cb.checked; updateSummary(); }
}

function updateSummary() {
    const checks  = document.querySelectorAll('.pay-check:checked');
    const empty   = document.getElementById('summaryEmpty');
    const list    = document.getElementById('summaryList');
    const items   = document.getElementById('summaryItems');
    const total   = document.getElementById('totalDisplay');
    let sum = 0, html = '';

    checks.forEach(c => {
        const amt = parseFloat(c.dataset.amount);
        sum += amt;
        html += `<div class="summary-item">
            <span class="summary-item-month">${c.dataset.month}</span>
            <span class="summary-item-amt">₱${amt.toLocaleString('en-PH',{minimumFractionDigits:2})}</span>
        </div>`;
    });

    if(checks.length === 0) {
        empty.style.display = 'flex';
        list.style.display  = 'none';
    } else {
        empty.style.display = 'none';
        list.style.display  = 'block';
        items.innerHTML = html;
        total.textContent = '₱' + sum.toLocaleString('en-PH',{minimumFractionDigits:2});
    }
}

function setMethod(val) {
    document.querySelectorAll('input[name=payment_method]').forEach(r => {
        r.checked = r.value === val;
    });
}

document.querySelectorAll('.pay-check').forEach(c =>
    c.addEventListener('change', updateSummary)
);
</script>
<?= $this->endSection() ?>