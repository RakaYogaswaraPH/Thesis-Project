<?php
include '../../config/config.php';
session_start();
if (!isset($_SESSION['pengguna'])) {
    header("Location: ../../login.php");
    exit;
}
$pengguna = getPenggunaById($_SESSION['pengguna']['id']);

/**
 * Fungsi untuk mengambil soal dan jawaban dari database
 */
function getSoalCPI($connect)
{
    $sql = "SELECT s.soal_id, s.kriteria, s.pertanyaan, 
                j.id AS jawaban_id, j.jawaban, j.nilai_konversi
            FROM soal_cpi s
            JOIN jawaban_cpi j ON s.soal_id = j.soal_id
            ORDER BY s.soal_id ASC";

    $result = $connect->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[$row['soal_id']]['pertanyaan'] = $row['pertanyaan'];
            $data[$row['soal_id']]['kriteria']   = $row['kriteria'];
            $data[$row['soal_id']]['jawaban'][]  = [
                'id'    => $row['jawaban_id'],
                'text'  => $row['jawaban'],
                'nilai' => $row['nilai_konversi']
            ];
        }
    }
    return $data;
}


$soal_data = getSoalCPI($connect);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMH | Tes Kecerdasan</title>
    <link rel="stylesheet" href="../../src/styles/style.css">
    <link rel="icon" href="../../src/images/Logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../src/styles/style.css">
</head>

<body class="font-[poppins] text-gray-800 overflow-x-hidden bg-gradient-to-br bg-secondary-400 min-h-screen">
    <?php include '../../components/user/navbar.php'; ?>
    <?php include '../../components/mobileNavbar.php'; ?>

    <div class="container mx-auto px-4 py-8">
        <!-- Progress Bar -->
        <div class="max-w-2xl mx-auto mb-8">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-white">Tes Kecerdasan</h1>
                <div class="flex items-center gap-2 text-sm text-white">
                    <i class="fas fa-clock"></i>
                    <span>±5 menit</span>
                </div>
            </div>

            <!-- Progress Tracker -->
            <div class="bg-white rounded-full p-5 shadow-lg">
                <div class="flex items-center justify-between mb-2 px-2">
                    <span id="progress-text" class="text-sm font-semibold text-gray-700">Soal 1/15</span>
                    <span id="progress-percentage" class="text-sm font-semibold text-indigo-600">7%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div id="progress-bar" class="bg-gradient-to-r from-indigo-500 to-purple-600 h-full rounded-full transition-all duration-500 ease-out" style="width: 6.67%"></div>
                </div>
            </div>
        </div>

        <!-- Quiz Container -->
        <div class="max-w-2xl mx-auto">
            <!-- Question Cards -->
            <div id="quiz-container" class="bg-white rounded-3xl shadow-2xl border border-white/50 overflow-hidden">
                <form id="quiz-form" action="hasil_tes.php" method="post">
                    <?php $no = 1;
                    foreach ($soal_data as $soal_id => $soal): ?>
                        <div class="question-slide <?= $no === 1 ? 'active' : 'hidden' ?> p-8" data-question="<?= $no ?>">
                            <div class="text-center mb-8">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full mb-4 shadow-lg">
                                    <span class="text-xl font-bold"><?= $no ?></span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 leading-relaxed">
                                    <?= htmlspecialchars($soal['pertanyaan']) ?>
                                </h3>
                            </div>

                            <div class="space-y-4">
                                <?php foreach ($soal['jawaban'] as $index => $jawaban): ?>
                                    <label class="block group cursor-pointer">
                                        <div class="flex items-center space-x-4 p-4 rounded-2xl border-2 border-gray-200 hover:border-indigo-300 hover:bg-indigo-50 transition-all duration-200 group-hover:shadow-md">
                                            <input type="radio"
                                                name="jawaban[<?= $soal_id ?>]"
                                                value="<?= $jawaban['nilai'] ?>"
                                                required
                                                class="w-5 h-5 text-indigo-600 border-2 border-gray-300 focus:ring-indigo-500 focus:ring-offset-0">
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3">
                                                    <div class="w-8 h-8 bg-gray-100 group-hover:bg-indigo-100 rounded-full flex items-center justify-center text-sm font-semibold text-gray-600 group-hover:text-indigo-600 transition-colors">
                                                        <?= chr(65 + $index) ?>
                                                    </div>
                                                    <span class="text-gray-700 group-hover:text-gray-900 font-medium">
                                                        <?= htmlspecialchars($jawaban['text']) ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php $no++;
                    endforeach; ?>
                </form>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center mt-8">
                <button id="prev-btn"
                    class="hidden px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-2xl transition-all duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-chevron-left mr-2"></i> Sebelumnya
                </button>

                <div class="flex-1"></div>

                <button id="next-btn"
                    class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold rounded-2xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                    Berikutnya <i class="fas fa-chevron-right ml-2"></i>
                </button>

                <button id="finish-btn"
                    class="hidden px-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold rounded-2xl transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    Akhiri Tes <i class="fas fa-flag-checkered ml-2"></i>
                </button>
            </div>
        </div>

        <!-- Completion Modal -->
        <div id="completion-modal" class="fixed inset-0 bg-transparent bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
            <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full text-center p-8 transform scale-95 opacity-0 transition-all duration-300" id="modal-content">
                <div class="mb-6">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full mb-4 animate-bounce">
                        <i class="fas fa-trophy text-white text-3xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">KAMU HEBAT!</h2>
                    <p class="text-gray-600">Selamat! Anda telah menyelesaikan tes kecerdasan dengan baik.</p>
                </div>
                <button id="submit-test"
                    class="w-full py-4 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                    Lihat Hasil <i class="fas fa-chart-line ml-2"></i>
                </button>
            </div>
        </div>

        <footer class="text-center mt-12 text-gray-600 text-sm">
            <p>©2025 Pos Paud Mawar Hidayah • All Rights Reserved</p>
        </footer>
    </div>

    <script>
        class QuizApp {
            constructor() {
                this.currentQuestion = 1;
                this.totalQuestions = <?= count($soal_data) ?>;
                this.answers = {};
                this.init();
            }

            init() {
                this.bindEvents();
                this.updateUI();
            }

            bindEvents() {
                // Next button
                document.getElementById('next-btn').addEventListener('click', () => {
                    if (this.validateCurrentQuestion()) {
                        this.nextQuestion();
                    }
                });

                // Previous button
                document.getElementById('prev-btn').addEventListener('click', () => {
                    this.prevQuestion();
                });

                // Finish button
                document.getElementById('finish-btn').addEventListener('click', () => {
                    if (this.validateCurrentQuestion()) {
                        this.showCompletionModal();
                    }
                });

                // Submit test
                document.getElementById('submit-test').addEventListener('click', () => {
                    document.getElementById('quiz-form').submit();
                });

                // Radio button change events
                document.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.addEventListener('change', () => {
                        this.updateNextButton();
                    });
                });
            }

            validateCurrentQuestion() {
                const currentSlide = document.querySelector(`[data-question="${this.currentQuestion}"]`);
                const radios = currentSlide.querySelectorAll('input[type="radio"]');
                return Array.from(radios).some(radio => radio.checked);
            }

            nextQuestion() {
                if (this.currentQuestion < this.totalQuestions) {
                    this.hideCurrentQuestion();
                    this.currentQuestion++;
                    this.showCurrentQuestion();
                    this.updateUI();
                }
            }

            prevQuestion() {
                if (this.currentQuestion > 1) {
                    this.hideCurrentQuestion();
                    this.currentQuestion--;
                    this.showCurrentQuestion();
                    this.updateUI();
                }
            }

            hideCurrentQuestion() {
                const current = document.querySelector('.question-slide.active');
                if (current) {
                    current.classList.remove('active');
                    current.classList.add('hidden');
                }
            }

            showCurrentQuestion() {
                const next = document.querySelector(`[data-question="${this.currentQuestion}"]`);
                if (next) {
                    next.classList.remove('hidden');
                    next.classList.add('active');
                }
            }

            updateUI() {
                this.updateProgressBar();
                this.updateButtons();
                this.updateNextButton();
            }

            updateProgressBar() {
                const progress = (this.currentQuestion / this.totalQuestions) * 100;
                const progressBar = document.getElementById('progress-bar');
                const progressText = document.getElementById('progress-text');
                const progressPercentage = document.getElementById('progress-percentage');

                progressBar.style.width = `${progress}%`;
                progressText.textContent = `Soal ${this.currentQuestion}/${this.totalQuestions}`;
                progressPercentage.textContent = `${Math.round(progress)}%`;
            }

            updateButtons() {
                const prevBtn = document.getElementById('prev-btn');
                const nextBtn = document.getElementById('next-btn');
                const finishBtn = document.getElementById('finish-btn');

                // Previous button
                if (this.currentQuestion > 1) {
                    prevBtn.classList.remove('hidden');
                } else {
                    prevBtn.classList.add('hidden');
                }

                // Next/Finish button
                if (this.currentQuestion === this.totalQuestions) {
                    nextBtn.classList.add('hidden');
                    finishBtn.classList.remove('hidden');
                } else {
                    nextBtn.classList.remove('hidden');
                    finishBtn.classList.add('hidden');
                }
            }

            updateNextButton() {
                const nextBtn = document.getElementById('next-btn');
                const finishBtn = document.getElementById('finish-btn');
                const isValid = this.validateCurrentQuestion();

                nextBtn.disabled = !isValid;
                finishBtn.disabled = !isValid;

                if (isValid) {
                    nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    finishBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
                    finishBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            showCompletionModal() {
                const modal = document.getElementById('completion-modal');
                const content = document.getElementById('modal-content');

                modal.classList.remove('hidden');

                setTimeout(() => {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }, 10);
            }
        }

        // Initialize the quiz app when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new QuizApp();
        });
    </script>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="../../src/js/modal.js"></script>
</body>

</html>