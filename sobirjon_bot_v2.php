<?php
// ==================================================
//  ANONIM SAVOL-JAVOB + "MENI YAXSHI TANIYSIZMI?" BOT
//  Bot egasi: @theakrmjnvv
// ==================================================
//  Termux / kompyuter:  php anonim_bot.php poll
//  Hosting (webhook):   brauzerda ?setup=1 ni oching
//
//  MUHIM: majburiy obuna ishlashi uchun botni
//  kanalingizga ADMIN qilib qo'shing!
// ==================================================

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', '0');

define('TOKEN', '8908556598:AAFANFdbpUB3aKg8loXcORvJ8D_u6WzSvKE');
define('ADMIN_ID', 7705642357);
define('CHANNEL', '@akrmjnvvvvv');
define('CHANNEL_URL', 'https://t.me/akrmjnvvvvv');
define('DB', __DIR__ . '/data.json');

// ==================================================
//  MATNLAR (uz / ru / en)
// ==================================================
$L = [];
function L($k, $u, $r, $e) { global $L; $L[$k] = ['uz' => $u, 'ru' => $r, 'en' => $e]; }

// --- Menyu tugmalari ---
L('b_quiz', "🎯 Meni yaxshi taniysizmi?", "🎯 Как хорошо ты меня знаешь?", "🎯 How well do you know me?");
L('b_anon', "🕵️ Anonim savol havolam", "🕵️ Моя анонимная ссылка", "🕵️ My anonymous link");
L('b_qlink', "🔗 Test havolam", "🔗 Ссылка на мой тест", "🔗 My quiz link");
L('b_res', "🏆 Natijalar", "🏆 Результаты", "🏆 Results");
L('b_top', "🌟 Umumiy reyting", "🌟 Общий рейтинг", "🌟 Global ranking");
L('b_ref', "🎁 Do'st taklif qilish", "🎁 Пригласить друзей", "🎁 Invite friends");
L('b_redo', "🔄 Testni qayta yaratish", "🔄 Пересоздать тест", "🔄 Recreate quiz");
L('b_stat', "📊 Statistika", "📊 Статистика", "📊 Statistics");
L('b_lang', "🌍 Til", "🌍 Язык", "🌍 Language");
L('b_help', "ℹ️ Yordam", "ℹ️ Помощь", "ℹ️ Help");

// --- Umumiy ---
L('footer', "🤖 Bot egasi: @theakrmjnvv", "🤖 Владелец бота: @theakrmjnvv", "🤖 Bot owner: @theakrmjnvv");
L('welcome',
    "👋 Salom, <b>%s</b>!\n\nBu botda quyidagi imkoniyatlar bor:\n\n🕵️ <b>Anonim savollar</b>: odamlar sizga ismini oshkor qilmasdan yozadi.\n🎯 <b>Meni yaxshi taniysizmi?</b>: do'stlaringiz sizni qanchalik taniydi, foizda bilib oling.\n🌟 <b>Reyting</b> va 🎁 <b>do'st taklif qilish</b>.\n\nQuyidagi tugmalardan birini tanlang 👇",
    "👋 Привет, <b>%s</b>!\n\nВ этом боте есть:\n\n🕵️ <b>Анонимные вопросы</b>: люди пишут вам, не раскрывая имени.\n🎯 <b>Как хорошо ты меня знаешь?</b>: узнайте в процентах, насколько друзья вас знают.\n🌟 <b>Рейтинг</b> и 🎁 <b>приглашение друзей</b>.\n\nВыберите кнопку ниже 👇",
    "👋 Hi, <b>%s</b>!\n\nThis bot has:\n\n🕵️ <b>Anonymous questions</b>: people write to you without revealing their name.\n🎯 <b>How well do you know me?</b>: find out in percent how well your friends know you.\n🌟 <b>Ranking</b> and 🎁 <b>friend invites</b>.\n\nChoose a button below 👇");
L('sub_need',
    "📢 Botdan foydalanish uchun avval kanalimizga a'zo bo'ling, so'ng «✅ Tekshirish» tugmasini bosing.",
    "📢 Чтобы пользоваться ботом, сначала подпишитесь на наш канал, затем нажмите «✅ Проверить».",
    "📢 To use the bot, first join our channel, then press «✅ Check».");
L('btn_channel', "📢 Kanalga o'tish", "📢 Перейти в канал", "📢 Open channel");
L('btn_check', "✅ Tekshirish", "✅ Проверить", "✅ Check");
L('not_sub', "❌ Siz hali kanalga a'zo bo'lmagansiz!", "❌ Вы ещё не подписаны на канал!", "❌ You haven't joined the channel yet!");
L('thanks', "✅ Rahmat! Endi botdan foydalanishingiz mumkin.", "✅ Спасибо! Теперь вы можете пользоваться ботом.", "✅ Thanks! You can now use the bot.");
L('cancelled', "✅ Bekor qilindi.", "✅ Отменено.", "✅ Cancelled.");
L('use_menu', "Quyidagi tugmalardan foydalaning 👇", "Используйте кнопки ниже 👇", "Use the buttons below 👇");
L('press_btn',
    "☝️ Iltimos, savol tagidagi tugmalardan birini bosing.\nBekor qilish: /cancel",
    "☝️ Пожалуйста, нажмите одну из кнопок под вопросом.\nОтмена: /cancel",
    "☝️ Please press one of the buttons under the question.\nCancel: /cancel");
L('lang_choose', "🌍 Tilni tanlang\n🌍 Выберите язык\n🌍 Choose language", "🌍 Tilni tanlang\n🌍 Выберите язык\n🌍 Choose language", "🌍 Tilni tanlang\n🌍 Выберите язык\n🌍 Choose language");
L('lang_set', "✅ Til o'zgartirildi: O'zbekcha", "✅ Язык изменён: Русский", "✅ Language changed: English");

// --- Anonim savol ---
L('self_anon',
    "😅 O'zingizga savol yubora olmaysiz. Havolangizni do'stlaringizga yuboring!",
    "😅 Нельзя задать вопрос самому себе. Отправьте свою ссылку друзьям!",
    "😅 You can't ask yourself. Send your link to your friends!");
L('no_user', "❌ Bunday foydalanuvchi topilmadi.", "❌ Такой пользователь не найден.", "❌ User not found.");
L('blocked_you', "🚫 Siz bu foydalanuvchiga yoza olmaysiz.", "🚫 Вы не можете писать этому пользователю.", "🚫 You can't write to this user.");
L('anon_start',
    "🕵️ Siz <b>anonim</b> xabar yuboryapsiz.\nKimligingiz hech kimga ko'rinmaydi.\n\n✍️ Savol yoki xabaringizni yozing:\n(Bekor qilish: /cancel)",
    "🕵️ Вы отправляете <b>анонимное</b> сообщение.\nВаша личность никому не видна.\n\n✍️ Напишите вопрос или сообщение:\n(Отмена: /cancel)",
    "🕵️ You are sending an <b>anonymous</b> message.\nYour identity stays hidden.\n\n✍️ Write your question or message:\n(Cancel: /cancel)");
L('anon_sent',
    "✅ Xabaringiz <b>anonim</b> yuborildi!\n\nSizning ham havolangiz:\n%s",
    "✅ Ваше сообщение отправлено <b>анонимно</b>!\n\nА вот ваша ссылка:\n%s",
    "✅ Your message was sent <b>anonymously</b>!\n\nHere is your own link:\n%s");
L('anon_fail',
    "❌ Xabar yetib bormadi. Egasi botni to'xtatgan bo'lishi mumkin.",
    "❌ Сообщение не доставлено. Возможно, владелец остановил бота.",
    "❌ Message not delivered. The owner may have stopped the bot.");
L('new_anon', "📩 <b>Yangi anonim xabar</b> #%d", "📩 <b>Новое анонимное сообщение</b> #%d", "📩 <b>New anonymous message</b> #%d");
L('btn_reply', "✍️ Javob berish", "✍️ Ответить", "✍️ Reply");
L('btn_block', "🚫 Bloklash", "🚫 Заблокировать", "🚫 Block");
L('btn_again', "✍️ Yana yozish", "✍️ Написать ещё", "✍️ Write again");
L('reply_prompt',
    "✍️ Javobingizni yozing (matn, rasm, ovoz, hammasi bo'ladi).\nBekor qilish: /cancel",
    "✍️ Напишите ответ (текст, фото, голос, всё подойдёт).\nОтмена: /cancel",
    "✍️ Write your reply (text, photo, voice, anything works).\nCancel: /cancel");
L('blocked_done',
    "🚫 Bu foydalanuvchi bloklandi. U endi sizga yoza olmaydi.",
    "🚫 Пользователь заблокирован. Он больше не сможет вам писать.",
    "🚫 User blocked. They can't write to you anymore.");
L('again_prompt', "✍️ Yana anonim xabaringizni yozing.\nBekor qilish: /cancel", "✍️ Напишите ещё одно анонимное сообщение.\nОтмена: /cancel", "✍️ Write another anonymous message.\nCancel: /cancel");
L('reply_head', "💬 <b>Savolingizga javob keldi!</b>", "💬 <b>Пришёл ответ на ваш вопрос!</b>", "💬 <b>You got a reply to your question!</b>");
L('reply_sent',
    "✅ Javobingiz yuborildi (u sizni emas, faqat javobni ko'radi).",
    "✅ Ответ отправлен (он увидит только ответ, не вас).",
    "✅ Reply sent (they see only the reply, not you).");
L('reply_fail', "❌ Javob yetib bormadi.", "❌ Ответ не доставлен.", "❌ Reply not delivered.");
L('anon_link_msg',
    "🕵️ <b>Anonim savol havolangiz:</b>\n%s\n\nShuni do'stlaringizga yuboring, ular sizga ismini yashirib yozadi.",
    "🕵️ <b>Ваша ссылка для анонимных вопросов:</b>\n%s\n\nОтправьте её друзьям, и они смогут писать вам анонимно.",
    "🕵️ <b>Your anonymous question link:</b>\n%s\n\nSend it to your friends so they can write to you anonymously.");

// --- Test (quiz) ---
L('self_quiz',
    "😅 O'z testingizni o'zingiz yecha olmaysiz. Havolani do'stlaringizga yuboring!\n\n%s",
    "😅 Нельзя проходить собственный тест. Отправьте ссылку друзьям!\n\n%s",
    "😅 You can't take your own quiz. Send the link to your friends!\n\n%s");
L('quiz_not_found', "❌ Bu test topilmadi.", "❌ Этот тест не найден.", "❌ This quiz was not found.");
L('take_intro',
    "🎯 <b>%s</b> ni qanchalik taniysiz?\n\nSavollarga <b>u qanday javob bergan bo'lishi mumkin</b>, shuni taxmin qiling!",
    "🎯 Насколько хорошо вы знаете <b>%s</b>?\n\nУгадайте, <b>как он(а) ответил(а)</b> на вопросы!",
    "🎯 How well do you know <b>%s</b>?\n\nGuess <b>how they answered</b> the questions!");
L('take_head', "🎯 <b>%s</b> ni qanchalik taniysiz?", "🎯 Насколько хорошо вы знаете <b>%s</b>?", "🎯 How well do you know <b>%s</b>?");
L('make_head', "🎯 <b>Meni yaxshi taniysizmi?</b>", "🎯 <b>Как хорошо ты меня знаешь?</b>", "🎯 <b>How well do you know me?</b>");
L('make_intro',
    "🎯 <b>Meni yaxshi taniysizmi?</b>\n\nO'zingiz haqingizda savollarga <b>haqiqiy javobingizni</b> tanlang. Keyin do'stlaringiz xuddi shu savollarga sizni taxmin qilib javob beradi.",
    "🎯 <b>Как хорошо ты меня знаешь?</b>\n\nВыберите <b>свой настоящий ответ</b> на вопросы о себе. Потом друзья будут угадывать ваши ответы.",
    "🎯 <b>How well do you know me?</b>\n\nPick your <b>real answer</b> to each question about yourself. Then your friends will try to guess your answers.");
L('choose_type',
    "🎯 <b>Test yaratish</b>\n\nQanday savollar bilan test tuzamiz?",
    "🎯 <b>Создание теста</b>\n\nС какими вопросами составим тест?",
    "🎯 <b>Create a quiz</b>\n\nWhich questions do you want to use?");
L('redo_warn',
    "⚠️ Eski testingiz va uning natijalari o'chib ketadi.\n\n",
    "⚠️ Старый тест и его результаты будут удалены.\n\n",
    "⚠️ Your old quiz and its results will be deleted.\n\n");
L('btn_default', "📋 Tayyor savollar (10 ta)", "📋 Готовые вопросы (10 шт.)", "📋 Ready-made questions (10)");
L('btn_custom', "✏️ O'z savollarim", "✏️ Свои вопросы", "✏️ My own questions");
L('btn_redo_inline', "🔄 Qayta yaratish", "🔄 Создать заново", "🔄 Recreate");
L('quiz_exists',
    "🎯 <b>Sizning testingiz tayyor.</b>\n\nHavola:\n%s\n\nYechganlar: <b>%d</b> ta",
    "🎯 <b>Ваш тест готов.</b>\n\nСсылка:\n%s\n\nПрошли тест: <b>%d</b>",
    "🎯 <b>Your quiz is ready.</b>\n\nLink:\n%s\n\nTaken by: <b>%d</b>");
L('quiz_ready',
    "✅ <b>Test tayyor!</b>\n\nMana sizning havolangiz:\n%s\n\nUni do'stlaringizga yuboring. Ular savollarga sizni taxmin qilib javob beradi, natijalar (kim, necha foiz) sizga keladi.",
    "✅ <b>Тест готов!</b>\n\nВаша ссылка:\n%s\n\nОтправьте её друзьям. Они будут угадывать ваши ответы, а результаты (кто и сколько процентов) придут вам.",
    "✅ <b>Quiz is ready!</b>\n\nYour link:\n%s\n\nSend it to your friends. They will guess your answers and the results (who and what percent) will come to you.");
L('quiz_hint',
    "Natijalarni «🏆 Natijalar» tugmasidan ham ko'rishingiz mumkin.",
    "Результаты также можно посмотреть кнопкой «🏆 Результаты».",
    "You can also see the results with the «🏆 Results» button.");
L('btn_share', "📤 Ulashish", "📤 Поделиться", "📤 Share");
L('share_text', "Meni qanchalik taniysan? 🎯 Sinab ko'r:", "Насколько хорошо ты меня знаешь? 🎯 Попробуй:", "How well do you know me? 🎯 Try it:");
L('result_taker',
    "🎉 <b>Test tugadi!</b>\n\n👤 Siz <b>%s</b> ni taniysiz:\n\n%s\n✅ To'g'ri javoblar: <b>%d/%d</b>\n📊 Natija: <b>%d%%</b>\n\n%s\n\nEndi o'zingiz ham test yarating va do'stlaringiz sizni qanchalik taniydi, bilib oling!",
    "🎉 <b>Тест окончен!</b>\n\n👤 Вы знаете <b>%s</b>:\n\n%s\n✅ Правильных ответов: <b>%d/%d</b>\n📊 Результат: <b>%d%%</b>\n\n%s\n\nТеперь создайте свой тест и узнайте, как хорошо вас знают друзья!",
    "🎉 <b>Quiz finished!</b>\n\n👤 You know <b>%s</b>:\n\n%s\n✅ Correct answers: <b>%d/%d</b>\n📊 Result: <b>%d%%</b>\n\n%s\n\nNow create your own quiz and see how well your friends know you!");
L('btn_mymake', "🎯 O'z testimni yaratish", "🎯 Создать свой тест", "🎯 Create my quiz");
L('btn_shareres', "📤 Natijani ulashish", "📤 Поделиться результатом", "📤 Share my result");
L('share_res', "Men %s ni %d%% taniyman! 🎯 Sen-chi? Sen ham sinab ko'r:", "Я знаю %s на %d%%! 🎯 А ты? Попробуй и ты:", "I know %s %d%%! 🎯 What about you? Try it too:");
L('owner_notify',
    "🔔 <b>Yangi natija!</b>\n\n👤 %s\n\n%s\n🎯 Sizni <b>%d/%d</b> ta savolda topdi\n📊 Natija: <b>%d%%</b>\n\n%s",
    "🔔 <b>Новый результат!</b>\n\n👤 %s\n\n%s\n🎯 Угадал(а) <b>%d/%d</b> ответов\n📊 Результат: <b>%d%%</b>\n\n%s",
    "🔔 <b>New result!</b>\n\n👤 %s\n\n%s\n🎯 Guessed <b>%d/%d</b> answers\n📊 Result: <b>%d%%</b>\n\n%s");
L('friend', "Do'stingiz", "Ваш друг", "Your friend");
L('no_quiz', "Sizda hali test yo'q. «🎯 Meni yaxshi taniysizmi?» tugmasini bosing.", "У вас ещё нет теста. Нажмите «🎯 Как хорошо ты меня знаешь?».", "You don't have a quiz yet. Press «🎯 How well do you know me?».");
L('no_results', "Hali hech kim testingizni yechmadi. Havolani ulashing:\n%s", "Пока никто не прошёл ваш тест. Поделитесь ссылкой:\n%s", "Nobody has taken your quiz yet. Share the link:\n%s");
L('res_title', "🏆 <b>Sizni kim qanchalik taniydi?</b>\n\n", "🏆 <b>Кто как хорошо вас знает?</b>\n\n", "🏆 <b>Who knows you best?</b>\n\n");
L('qlink_msg', "🎯 <b>Test havolangiz:</b>\n%s\n\nShuni do'stlaringizga yuboring!", "🎯 <b>Ссылка на ваш тест:</b>\n%s\n\nОтправьте её друзьям!", "🎯 <b>Your quiz link:</b>\n%s\n\nSend it to your friends!");
L('stat',
    "📊 <b>Sizning statistikangiz</b>\n\n📩 Olingan anonim savollar: %d\n📤 Yuborgan anonim xabarlaringiz: %d\n🎯 Testingizni yechganlar: %d\n🎁 Taklif qilgan do'stlaringiz: %d",
    "📊 <b>Ваша статистика</b>\n\n📩 Получено анонимных вопросов: %d\n📤 Отправлено анонимных сообщений: %d\n🎯 Прошли ваш тест: %d\n🎁 Приглашено друзей: %d",
    "📊 <b>Your statistics</b>\n\n📩 Anonymous questions received: %d\n📤 Anonymous messages sent: %d\n🎯 People who took your quiz: %d\n🎁 Friends you invited: %d");

// --- O'z savollarini yozish ---
L('cq_ask', "✏️ <b>%d-savolni</b> yozing (matn):\n\nBekor qilish: /cancel", "✏️ Напишите <b>вопрос №%d</b> (текстом):\n\nОтмена: /cancel", "✏️ Write <b>question #%d</b> (text):\n\nCancel: /cancel");
L('cq_opts',
    "Endi <b>javob variantlarini</b> yozing, har birini yangi qatordan (2 tadan 4 tagacha).\n\nMasalan:\nQizil\nKo'k\nYashil",
    "Теперь напишите <b>варианты ответа</b>, каждый с новой строки (от 2 до 4).\n\nНапример:\nКрасный\nСиний\nЗелёный",
    "Now write the <b>answer options</b>, each on a new line (2 to 4).\n\nExample:\nRed\nBlue\nGreen");
L('cq_text_err', "❌ Matn yozing.", "❌ Напишите текст.", "❌ Please write some text.");
L('cq_opts_err', "❌ 2 tadan 4 tagacha variant kerak, har biri yangi qatorda.", "❌ Нужно от 2 до 4 вариантов, каждый с новой строки.", "❌ You need 2 to 4 options, each on a new line.");
L('cq_pick', "✅ Savol: <b>%s</b>\n\nQaysi variant <b>sizning haqiqiy javobingiz</b>?", "✅ Вопрос: <b>%s</b>\n\nКакой вариант — <b>ваш настоящий ответ</b>?", "✅ Question: <b>%s</b>\n\nWhich option is <b>your real answer</b>?");
L('cq_added', "✅ Savol qo'shildi (%d/10).\n\n✏️ Keyingi savolni yozing.", "✅ Вопрос добавлен (%d/10).\n\n✏️ Напишите следующий вопрос.", "✅ Question added (%d/10).\n\n✏️ Write the next question.");
L('cq_can_finish', "\n\nYoki testni hozir tugatishingiz mumkin 👇", "\n\nИли завершите тест сейчас 👇", "\n\nOr you can finish the quiz now 👇");
L('btn_finish', "✅ Testni tugatish", "✅ Завершить тест", "✅ Finish quiz");
L('cq_min', "Kamida 3 ta savol kerak.", "Нужно минимум 3 вопроса.", "At least 3 questions are needed.");

// --- Reyting va taklif ---
L('top_title', "🌟 <b>Eng yaxshi taniladigan odamlar (TOP 10)</b>\n\n", "🌟 <b>Самые узнаваемые люди (ТОП 10)</b>\n\n", "🌟 <b>Best-known people (TOP 10)</b>\n\n");
L('top_empty', "Hali reyting yo'q.", "Рейтинга пока нет.", "No ranking yet.");
L('top_line', "%s %s — <b>%d%%</b> (%d ta javob)", "%s %s — <b>%d%%</b> (ответов: %d)", "%s %s — <b>%d%%</b> (%d answers)");
L('ref_msg',
    "🎁 <b>Do'stlarni taklif qiling!</b>\n\nHavolangiz:\n%s\n\nSiz taklif qilganlar: <b>%d</b> ta\n\n🏆 <b>Eng ko'p taklif qilganlar (TOP 10):</b>\n%s",
    "🎁 <b>Приглашайте друзей!</b>\n\nВаша ссылка:\n%s\n\nВы пригласили: <b>%d</b>\n\n🏆 <b>Больше всего приглашений (ТОП 10):</b>\n%s",
    "🎁 <b>Invite your friends!</b>\n\nYour link:\n%s\n\nYou invited: <b>%d</b>\n\n🏆 <b>Most invites (TOP 10):</b>\n%s");
L('ref_empty', "Hali hech kim yo'q.", "Пока никого нет.", "Nobody yet.");
L('ref_line', "%s %s — <b>%d</b> ta", "%s %s — <b>%d</b>", "%s %s — <b>%d</b>");
L('ref_joined', "🎉 Sizning havolangiz orqali yangi foydalanuvchi qo'shildi! Jami: <b>%d</b>", "🎉 По вашей ссылке присоединился новый пользователь! Всего: <b>%d</b>", "🎉 A new user joined with your link! Total: <b>%d</b>");

// --- Yordam ---
L('help',
    "ℹ️ <b>Qanday ishlaydi?</b>\n\n<b>🕵️ Anonim savol:</b>\n1. Havolangizni oling\n2. Ulashing\n3. Odamlar anonim yozadi\n4. «Javob berish» yoki «Bloklash» tugmasi\n\n<b>🎯 Meni yaxshi taniysizmi?</b>\n1. Savollarga o'zingiz haqingizda javob bering (tayyor yoki o'zingiz yozgan)\n2. Test havolasini do'stlarga yuboring\n3. Ular sizni taxmin qiladi\n4. Kim necha foiz topgani sizga keladi\n\n<b>🎁 Taklif:</b> do'stlaringizni taklif qiling va reytingda yuqoriga chiqing.\n\nBekor qilish: /cancel",
    "ℹ️ <b>Как это работает?</b>\n\n<b>🕵️ Анонимные вопросы:</b>\n1. Получите свою ссылку\n2. Поделитесь ею\n3. Люди пишут анонимно\n4. Кнопки «Ответить» или «Заблокировать»\n\n<b>🎯 Как хорошо ты меня знаешь?</b>\n1. Ответьте на вопросы о себе (готовые или свои)\n2. Отправьте ссылку на тест друзьям\n3. Они угадывают ваши ответы\n4. Вам приходит, кто и сколько процентов угадал\n\n<b>🎁 Приглашения:</b> зовите друзей и поднимайтесь в рейтинге.\n\nОтмена: /cancel",
    "ℹ️ <b>How does it work?</b>\n\n<b>🕵️ Anonymous questions:</b>\n1. Get your link\n2. Share it\n3. People write anonymously\n4. «Reply» or «Block» buttons\n\n<b>🎯 How well do you know me?</b>\n1. Answer questions about yourself (ready-made or your own)\n2. Send the quiz link to friends\n3. They guess your answers\n4. You get who guessed and what percent\n\n<b>🎁 Invites:</b> invite friends and climb the ranking.\n\nCancel: /cancel");

// --- Baholash so'zlari ---
L('v100', "🏆 Mukammal! Siz uni juda yaxshi taniysiz!", "🏆 Идеально! Вы его отлично знаете!", "🏆 Perfect! You know them really well!");
L('v80', "🔥 Zo'r! Siz uni juda yaxshi taniysiz.", "🔥 Отлично! Вы его очень хорошо знаете.", "🔥 Great! You know them very well.");
L('v60', "👍 Yaxshi, uni ancha taniysiz.", "👍 Хорошо, вы его неплохо знаете.", "👍 Good, you know them quite well.");
L('v40', "🤔 O'rtacha, yana bir oz tanishish kerak.", "🤔 Средне, стоит узнать друг друга получше.", "🤔 Average, you should get to know them better.");
L('v20', "😅 Uncha tanimas ekansiz...", "😅 Похоже, вы его почти не знаете...", "😅 Looks like you barely know them...");
L('v0', "🙈 Siz uni deyarli tanimaysiz!", "🙈 Вы его совсем не знаете!", "🙈 You hardly know them at all!");

// ==================================================
//  TAYYOR SAVOLLAR (variantlar tartibi hamma tilda bir xil)
// ==================================================
$Q = [
    'uz' => [
        ["Mening sevimli rangim qaysi?", ["🔴 Qizil", "🔵 Ko'k", "⚫ Qora", "🟢 Yashil"]],
        ["Mening sevimli taomim qaysi?", ["🍚 Osh", "🍜 Lag'mon", "🍢 Shashlik", "🍕 Pitsa"]],
        ["Yilning qaysi faslini yaxshi ko'raman?", ["🌸 Bahor", "☀️ Yoz", "🍂 Kuz", "❄️ Qish"]],
        ["Qaysi vaqtda faolroqman?", ["🌅 Ertalab", "🌤 Kunduzi", "🌆 Kechqurun", "🌙 Tunda"]],
        ["Bo'sh vaqtimda ko'proq nima qilaman?", ["😴 Uxlayman", "📱 Telefon o'ynayman", "🚶 Do'stlar bilan chiqaman", "📚 Kitob o'qiyman"]],
        ["Mening sevimli ichimligim?", ["🍵 Choy", "☕ Kofe", "🥤 Sovuq ichimlik", "🧃 Sharbat"]],
        ["Men qanday insonman?", ["😌 Xotirjam", "😂 Hazilkash", "😐 Jiddiy", "😤 Jahldor"]],
        ["Mening eng katta orzuyim?", ["💰 Boy bo'lish", "✈️ Dunyoni aylanish", "⭐ Mashhur bo'lish", "👨‍👩‍👧 Baxtli oila"]],
        ["Mening sevimli hayvonim?", ["🐱 Mushuk", "🐶 It", "🐴 Ot", "🐦 Qush"]],
        ["Telefonda eng ko'p nimaga vaqt sarflayman?", ["✈️ Telegram", "📸 Instagram", "▶️ YouTube", "🎮 O'yinlar"]],
    ],
    'ru' => [
        ["Какой мой любимый цвет?", ["🔴 Красный", "🔵 Синий", "⚫ Чёрный", "🟢 Зелёный"]],
        ["Моё любимое блюдо?", ["🍚 Плов", "🍜 Лагман", "🍢 Шашлык", "🍕 Пицца"]],
        ["Какое время года я люблю?", ["🌸 Весна", "☀️ Лето", "🍂 Осень", "❄️ Зима"]],
        ["В какое время я активнее?", ["🌅 Утром", "🌤 Днём", "🌆 Вечером", "🌙 Ночью"]],
        ["Чем я чаще занимаюсь в свободное время?", ["😴 Сплю", "📱 Сижу в телефоне", "🚶 Гуляю с друзьями", "📚 Читаю книги"]],
        ["Мой любимый напиток?", ["🍵 Чай", "☕ Кофе", "🥤 Газировка", "🧃 Сок"]],
        ["Какой я человек?", ["😌 Спокойный", "😂 Шутник", "😐 Серьёзный", "😤 Вспыльчивый"]],
        ["Моя главная мечта?", ["💰 Разбогатеть", "✈️ Объехать мир", "⭐ Стать известным", "👨‍👩‍👧 Счастливая семья"]],
        ["Моё любимое животное?", ["🐱 Кошка", "🐶 Собака", "🐴 Лошадь", "🐦 Птица"]],
        ["На что я трачу больше всего времени в телефоне?", ["✈️ Telegram", "📸 Instagram", "▶️ YouTube", "🎮 Игры"]],
    ],
    'en' => [
        ["What is my favorite color?", ["🔴 Red", "🔵 Blue", "⚫ Black", "🟢 Green"]],
        ["What is my favorite food?", ["🍚 Plov", "🍜 Lagman", "🍢 Kebab", "🍕 Pizza"]],
        ["Which season do I like most?", ["🌸 Spring", "☀️ Summer", "🍂 Autumn", "❄️ Winter"]],
        ["When am I most active?", ["🌅 Morning", "🌤 Daytime", "🌆 Evening", "🌙 Night"]],
        ["What do I do most in my free time?", ["😴 Sleep", "📱 Use my phone", "🚶 Hang out with friends", "📚 Read books"]],
        ["What is my favorite drink?", ["🍵 Tea", "☕ Coffee", "🥤 Soda", "🧃 Juice"]],
        ["What kind of person am I?", ["😌 Calm", "😂 Funny", "😐 Serious", "😤 Hot-tempered"]],
        ["What is my biggest dream?", ["💰 Get rich", "✈️ Travel the world", "⭐ Become famous", "👨‍👩‍👧 Happy family"]],
        ["What is my favorite animal?", ["🐱 Cat", "🐶 Dog", "🐴 Horse", "🐦 Bird"]],
        ["What do I spend the most time on my phone doing?", ["✈️ Telegram", "📸 Instagram", "▶️ YouTube", "🎮 Games"]],
    ],
];

// ==================================================
//  TELEGRAM API
// ==================================================
function api($method, $params = []) {
    foreach ($params as $k => $v) {
        if (is_array($v)) $params[$k] = json_encode($v, JSON_UNESCAPED_UNICODE);
    }
    $ch = curl_init("https://api.telegram.org/bot" . TOKEN . "/$method");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_TIMEOUT => 25,
    ]);
    $res = curl_exec($ch);
    return json_decode($res, true);
}

function send($chat, $text, $markup = null) {
    $p = ['chat_id' => $chat, 'text' => $text, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true];
    if ($markup) $p['reply_markup'] = $markup;
    return api('sendMessage', $p);
}

function edit($chat, $mid, $text, $markup = null) {
    $p = ['chat_id' => $chat, 'message_id' => $mid, 'text' => $text, 'parse_mode' => 'HTML', 'disable_web_page_preview' => true];
    if ($markup) $p['reply_markup'] = $markup;
    return api('editMessageText', $p);
}

// ==================================================
//  BAZA (JSON)
// ==================================================
function emptyDb() {
    return ['users' => [], 'state' => [], 'msgs' => [], 'blocked' => [], 'quiz' => [], 'pending' => [], 'counter' => 0, 'bot' => ''];
}

function load() {
    if (!file_exists(DB)) return emptyDb();
    $d = json_decode(file_get_contents(DB), true);
    return $d ? array_merge(emptyDb(), $d) : emptyDb();
}

function save($d) {
    file_put_contents(DB, json_encode($d, JSON_UNESCAPED_UNICODE), LOCK_EX);
}

// ==================================================
//  POLLING REJIMI (Termux): php anonim_bot.php poll
// ==================================================
if (PHP_SAPI === 'cli' && ($argv[1] ?? '') === 'poll') {
    api('deleteWebhook');
    echo "✅ Bot ishga tushdi (v2). To'xtatish: CTRL+C\n";
    $offset = 0;
    while (true) {
        $r = api('getUpdates', ['offset' => $offset, 'timeout' => 10]);
        foreach (($r['result'] ?? []) as $u) {
            $offset = $u['update_id'] + 1;
            $p = popen(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(__FILE__), 'w');
            fwrite($p, json_encode($u));
            pclose($p);
        }
        if (!isset($r['ok'])) sleep(3);
    }
}

// ==================================================
//  WEBHOOK O'RNATISH (hosting)
// ==================================================
if (isset($_GET['setup'])) {
    $url = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
    echo json_encode(api('setWebhook', ['url' => $url]));
    exit;
}

// ==================================================
//  KELGAN YANGILANISH
// ==================================================
$raw = (PHP_SAPI === 'cli') ? stream_get_contents(STDIN) : file_get_contents('php://input');
$update = json_decode($raw, true);
if (!$update) exit;

$from = $update['callback_query']['from'] ?? ($update['message']['from'] ?? null);
if (!$from) exit;
$uid = $from['id'];

$db = load();
if (empty($db['bot'])) {
    $me = api('getMe');
    $db['bot'] = $me['result']['username'] ?? '';
}

// ---------- Foydalanuvchini ro'yxatga olish ----------
if (!isset($db['users'][$uid])) {
    $db['users'][$uid] = [
        'name' => $from['first_name'] ?? '',
        'username' => $from['username'] ?? '',
        'date' => date('Y-m-d H:i'),
        'received' => 0, 'sent' => 0, 'refs' => 0, 'lang' => '',
    ];
    // Taklif (referal) havolasi orqali kelgan bo'lsa
    $firstText = $update['message']['text'] ?? '';
    if (preg_match('/^\/start ref(\d+)$/', $firstText, $m) && $m[1] != $uid && isset($db['users'][$m[1]])) {
        $refId = $m[1];
        $db['users'][$uid]['ref_by'] = $refId;
        $db['users'][$refId]['refs'] = ($db['users'][$refId]['refs'] ?? 0) + 1;
        save($db);
        $rl = ($db['users'][$refId]['lang'] ?? '') ?: 'uz';
        send($refId, T($rl, 'ref_joined', $db['users'][$refId]['refs']));
    } else {
        save($db);
    }
} else {
    $uname = $from['username'] ?? '';
    if (($db['users'][$uid]['username'] ?? '') !== $uname) {
        $db['users'][$uid]['username'] = $uname;
        save($db);
    }
}

$LANG = ($db['users'][$uid]['lang'] ?? '') ?: 'uz';

// ==================================================
//  YORDAMCHI FUNKSIYALAR
// ==================================================
function T($lang, $key, ...$a) {
    global $L;
    $s = $L[$key][$lang] ?? ($L[$key]['uz'] ?? $key);
    return $a ? vsprintf($s, $a) : $s;
}

function t($key, ...$a) {
    global $LANG;
    return T($LANG, $key, ...$a);
}

function menu($lang) {
    return [
        'keyboard' => [
            [['text' => T($lang, 'b_quiz')]],
            [['text' => T($lang, 'b_anon')], ['text' => T($lang, 'b_qlink')]],
            [['text' => T($lang, 'b_res')], ['text' => T($lang, 'b_top')]],
            [['text' => T($lang, 'b_ref')], ['text' => T($lang, 'b_redo')]],
            [['text' => T($lang, 'b_stat')], ['text' => T($lang, 'b_lang')]],
            [['text' => T($lang, 'b_help')]],
        ],
        'resize_keyboard' => true,
    ];
}

function btnKey($text) {
    global $L;
    foreach ($L as $k => $v) {
        if (strpos($k, 'b_') === 0) {
            foreach ($v as $s) if ($s === $text) return $k;
        }
    }
    return null;
}

function footer() { return "\n\n" . t('footer'); }

function anonLink($db, $id) { return "https://t.me/" . $db['bot'] . "?start=" . $id; }
function quizLink($db, $id) { return "https://t.me/" . $db['bot'] . "?start=q" . $id; }
function refLink($db, $id) { return "https://t.me/" . $db['bot'] . "?start=ref" . $id; }

function shareUrl($link, $text) {
    return 'https://t.me/share/url?url=' . urlencode($link) . '&text=' . urlencode($text);
}

function mention($id, $name, $username = '') {
    $s = '<a href="tg://user?id=' . $id . '">' . htmlspecialchars($name) . '</a>';
    if ($username) $s .= ' (@' . htmlspecialchars($username) . ')';
    return $s;
}

function medal($i) {
    return $i == 1 ? '🥇' : ($i == 2 ? '🥈' : ($i == 3 ? '🥉' : $i . '.'));
}

function verdict($p) {
    if ($p >= 100) return t('v100');
    if ($p >= 80) return t('v80');
    if ($p >= 60) return t('v60');
    if ($p >= 40) return t('v40');
    if ($p >= 20) return t('v20');
    return t('v0');
}

function defaultQs($lang) {
    global $Q;
    return $Q[$lang] ?? $Q['uz'];
}

function quizQs($quiz, $lang) {
    return !empty($quiz['qs']) ? $quiz['qs'] : defaultQs($lang);
}

function isSub($uid) {
    if ($uid == ADMIN_ID) return true;
    $r = api('getChatMember', ['chat_id' => CHANNEL, 'user_id' => $uid]);
    if (empty($r['ok'])) return true; // bot kanalda admin bo'lmasa, to'smaymiz
    $s = $r['result']['status'];
    if (in_array($s, ['member', 'administrator', 'creator'])) return true;
    if ($s === 'restricted' && !empty($r['result']['is_member'])) return true;
    return false;
}

function gate($chat) {
    send($chat, t('sub_need'), ['inline_keyboard' => [
        [['text' => t('btn_channel'), 'url' => CHANNEL_URL]],
        [['text' => t('btn_check'), 'callback_data' => 'chk']],
    ]]);
}

function langKeyboard() {
    return ['inline_keyboard' => [[
        ['text' => "🇺🇿 O'zbekcha", 'callback_data' => 'l:uz'],
        ['text' => '🇷🇺 Русский', 'callback_data' => 'l:ru'],
        ['text' => '🇬🇧 English', 'callback_data' => 'l:en'],
    ]]];
}

function showQ($chat, $step, $pfx, $head, $qs, $mid = null) {
    $total = count($qs);
    $rows = [];
    foreach ($qs[$step][1] as $i => $o) {
        $rows[] = [['text' => $o, 'callback_data' => "$pfx:$step:$i"]];
    }
    $bar = str_repeat('🟦', $step + 1) . str_repeat('⬜', $total - $step - 1);
    $text = $head . "\n\n" . $bar . "\n<b>" . ($step + 1) . "/" . $total . "</b>\n\n❓ <b>" . htmlspecialchars($qs[$step][0]) . "</b>";
    $markup = ['inline_keyboard' => $rows];
    if ($mid) edit($chat, $mid, $text, $markup);
    else send($chat, $text, $markup);
}

function showChoice($chat, $warn) {
    global $db, $uid;
    $text = ($warn && isset($db['quiz'][$uid]['ans']) ? t('redo_warn') : '') . t('choose_type');
    send($chat, $text, ['inline_keyboard' => [
        [['text' => t('btn_default'), 'callback_data' => 'md']],
        [['text' => t('btn_custom'), 'callback_data' => 'mc']],
    ]]);
}

function startMakeDefault($chat, $mid) {
    global $db, $uid, $LANG;
    $db['state'][$uid] = ['mode' => 'qmake', 'step' => 0, 'ans' => []];
    save($db);
    showQ($chat, 0, 'm', t('make_intro'), defaultQs($LANG), $mid);
}

function finishQuiz($chat, $mid, $ans, $qs) {
    global $db, $uid;
    $db['quiz'][$uid] = ['ans' => $ans, 'qs' => $qs, 'results' => []];
    unset($db['state'][$uid]);
    save($db);
    $link = quizLink($db, $uid);
    $markup = ['inline_keyboard' => [[['text' => t('btn_share'), 'url' => shareUrl($link, t('share_text'))]]]];
    $text = t('quiz_ready', $link) . footer();
    if ($mid) edit($chat, $mid, $text, $markup);
    else send($chat, $text, $markup);
    send($uid, t('quiz_hint'), menu($GLOBALS['LANG']));
}

// ==================================================
//  TUGMALAR (CALLBACK)
// ==================================================
if (isset($update['callback_query'])) {
    $cb = $update['callback_query'];
    $cid = $cb['message']['chat']['id'];
    $cmid = $cb['message']['message_id'];
    $data = $cb['data'];
    $st = $db['state'][$uid] ?? null;

    if ($data === 'chk') {
        // --- Obunani tekshirish ---
        if (!isSub($uid)) {
            api('answerCallbackQuery', ['callback_query_id' => $cb['id'], 'text' => t('not_sub'), 'show_alert' => true]);
            exit;
        }
        api('answerCallbackQuery', ['callback_query_id' => $cb['id']]);
        api('deleteMessage', ['chat_id' => $cid, 'message_id' => $cmid]);
        $pending = $db['pending'][$uid] ?? '';
        unset($db['pending'][$uid]);
        save($db);
        send($uid, t('thanks'), menu($LANG));
        // Kutib turgan /start buyrug'ini davom ettiramiz
        $update = ['message' => [
            'message_id' => 0,
            'from' => $cb['from'],
            'chat' => ['id' => $uid, 'type' => 'private'],
            'text' => $pending ?: '/start',
        ]];
    } else {
        api('answerCallbackQuery', ['callback_query_id' => $cb['id']]);

        // --- Til tanlash ---
        if (strpos($data, 'l:') === 0) {
            $lg = substr($data, 2);
            if (in_array($lg, ['uz', 'ru', 'en'])) {
                $db['users'][$uid]['lang'] = $lg;
                save($db);
                $LANG = $lg;
                edit($cid, $cmid, t('lang_set'));
                send($uid, t('use_menu'), menu($LANG));
            }
            exit;
        }

        // --- Majburiy obuna ---
        if (!isSub($uid)) {
            gate($cid);
            exit;
        }

        // --- Admin: reklama tasdiqlash ---
        if ($data === 'bcy' || $data === 'bcn') {
            if ($uid != ADMIN_ID || ($st['mode'] ?? '') !== 'bcw') exit;
            if ($data === 'bcn') {
                unset($db['state'][$uid]);
                save($db);
                edit($cid, $cmid, "❌ Bekor qilindi.");
                exit;
            }
            set_time_limit(0);
            ignore_user_abort(true);
            edit($cid, $cmid, "⏳ Yuborilmoqda...");
            $ok = 0; $bad = 0;
            foreach ($db['users'] as $id => $u) {
                $r = api('copyMessage', ['chat_id' => $id, 'from_chat_id' => ADMIN_ID, 'message_id' => $st['mid']]);
                if (!empty($r['ok'])) $ok++; else $bad++;
                usleep(60000);
            }
            unset($db['state'][$uid]);
            save($db);
            edit($cid, $cmid, "✅ Yuborildi: <b>$ok</b>\n❌ Yetib bormadi: <b>$bad</b>");
            exit;
        }

        // --- Test yaratish: tur tanlash ---
        if ($data === 'mk') {
            showChoice($cid, true);
            exit;
        }
        if ($data === 'md') {
            startMakeDefault($cid, $cmid);
            exit;
        }
        if ($data === 'mc') {
            $db['state'][$uid] = ['mode' => 'cq', 'phase' => 'text', 'qs' => [], 'ans' => [], 'cur' => []];
            save($db);
            edit($cid, $cmid, t('cq_ask', 1));
            exit;
        }

        // --- Tayyor savollarga yaratuvchi javobi: m:step:opt ---
        if (strpos($data, 'm:') === 0) {
            list(, $step, $opt) = array_map('intval', explode(':', $data));
            $qs = defaultQs($LANG);
            if (!$st || $st['mode'] !== 'qmake' || $st['step'] !== $step) exit;
            $st['ans'][] = $opt;
            if ($step >= count($qs) - 1) {
                finishQuiz($cid, $cmid, $st['ans'], null);
            } else {
                $st['step'] = $step + 1;
                $db['state'][$uid] = $st;
                save($db);
                showQ($cid, $step + 1, 'm', t('make_head'), $qs, $cmid);
            }
            exit;
        }

        // --- O'z savoli: to'g'ri variant tanlandi: c:i ---
        if (strpos($data, 'c:') === 0) {
            $i = (int)substr($data, 2);
            if (!$st || $st['mode'] !== 'cq' || $st['phase'] !== 'ans' || !isset($st['cur']['o'][$i])) exit;
            $st['qs'][] = [$st['cur']['q'], $st['cur']['o']];
            $st['ans'][] = $i;
            $n = count($st['qs']);
            if ($n >= 10) {
                finishQuiz($cid, $cmid, $st['ans'], $st['qs']);
                exit;
            }
            $st['phase'] = 'text';
            $st['cur'] = [];
            $db['state'][$uid] = $st;
            save($db);
            $txt = t('cq_added', $n);
            $markup = null;
            if ($n >= 3) {
                $txt .= t('cq_can_finish');
                $markup = ['inline_keyboard' => [[['text' => t('btn_finish'), 'callback_data' => 'cf']]]];
            }
            edit($cid, $cmid, $txt, $markup);
            send($uid, t('cq_ask', $n + 1));
            exit;
        }

        // --- O'z savollarini tugatish ---
        if ($data === 'cf') {
            if (!$st || $st['mode'] !== 'cq' || count($st['qs']) < 3) {
                send($uid, t('cq_min'));
                exit;
            }
            finishQuiz($cid, $cmid, $st['ans'], $st['qs']);
            exit;
        }

        // --- Do'st taxmin qildi: t:step:opt ---
        if (strpos($data, 't:') === 0) {
            list(, $step, $opt) = array_map('intval', explode(':', $data));
            if (!$st || $st['mode'] !== 'qtake' || $st['step'] !== $step) exit;
            $owner = $st['owner'];
            if (!isset($db['quiz'][$owner]['ans'])) exit;
            $quiz = $db['quiz'][$owner];
            $qs = quizQs($quiz, $LANG);
            $total = count($quiz['ans']);
            $st['ans'][] = $opt;

            if ($step >= $total - 1) {
                $score = 0;
                foreach ($quiz['ans'] as $i => $c) {
                    if (($st['ans'][$i] ?? -1) === $c) $score++;
                }
                $percent = (int)round($score * 100 / $total);
                $name = $cb['from']['first_name'] ?? 'User';
                $uname = $cb['from']['username'] ?? '';

                $db['quiz'][$owner]['results'][$uid] = [
                    'name' => $name, 'username' => $uname,
                    'score' => $score, 'total' => $total, 'percent' => $percent, 'date' => date('Y-m-d H:i'),
                ];
                unset($db['state'][$uid]);
                save($db);

                $ownerName = $db['users'][$owner]['name'] ?? t('friend');
                $bar = str_repeat('🟩', $score) . str_repeat('⬜', $total - $score);
                $ownerLink = quizLink($db, $owner);
                edit($cid, $cmid,
                    t('result_taker', htmlspecialchars($ownerName), $bar, $score, $total, $percent, verdict($percent)) . footer(),
                    ['inline_keyboard' => [
                        [['text' => t('btn_shareres'), 'url' => shareUrl($ownerLink, t('share_res', $ownerName, $percent))]],
                        [['text' => t('btn_mymake'), 'callback_data' => 'mk']],
                    ]]);

                // Test egasiga xabar (uning tilida)
                $ol = ($db['users'][$owner]['lang'] ?? '') ?: 'uz';
                $vkey = $percent >= 100 ? 'v100' : ($percent >= 80 ? 'v80' : ($percent >= 60 ? 'v60' : ($percent >= 40 ? 'v40' : ($percent >= 20 ? 'v20' : 'v0'))));
                send($owner, T($ol, 'owner_notify', mention($uid, $name, $uname), $bar, $score, $total, $percent, T($ol, $vkey)));
            } else {
                $st['step'] = $step + 1;
                $db['state'][$uid] = $st;
                save($db);
                $ownerName = $db['users'][$owner]['name'] ?? '';
                showQ($cid, $step + 1, 't', t('take_head', htmlspecialchars($ownerName)), $qs, $cmid);
            }
            exit;
        }

        // --- Anonim xabarga javob berish: r:N ---
        if (strpos($data, 'r:') === 0) {
            $n = substr($data, 2);
            if (!isset($db['msgs'][$n]) || $db['msgs'][$n]['to'] != $uid) exit;
            $db['state'][$uid] = ['mode' => 'reply', 'n' => $n];
            save($db);
            send($uid, t('reply_prompt'));
            exit;
        }

        // --- Bloklash: b:N ---
        if (strpos($data, 'b:') === 0) {
            $n = substr($data, 2);
            if (!isset($db['msgs'][$n]) || $db['msgs'][$n]['to'] != $uid) exit;
            $from_id = $db['msgs'][$n]['from'];
            $db['blocked'][$uid][] = $from_id;
            $db['blocked'][$uid] = array_values(array_unique($db['blocked'][$uid]));
            save($db);
            send($uid, t('blocked_done'));
            exit;
        }

        // --- Yana yozish: a:ID ---
        if (strpos($data, 'a:') === 0) {
            $target = substr($data, 2);
            $db['state'][$uid] = ['mode' => 'ask', 'to' => $target];
            save($db);
            send($uid, t('again_prompt'));
            exit;
        }
        exit;
    }
}

// ==================================================
//  XABARLAR
// ==================================================
if (!isset($update['message'])) exit;
$msg = $update['message'];
$chat = $msg['chat']['id'];
$text = $msg['text'] ?? '';
$mid = $msg['message_id'];

if ($msg['chat']['type'] !== 'private') exit;

// ---------- Majburiy obuna ----------
if (!isSub($uid)) {
    if (strpos($text, '/start') === 0) {
        $db['pending'][$uid] = $text;
        save($db);
    }
    gate($chat);
    exit;
}

// ---------- /start ----------
if (strpos($text, '/start') === 0) {
    $parts = explode(' ', $text);
    $target = $parts[1] ?? '';
    unset($db['state'][$uid]);

    // === Test havolasi: ?start=q123 ===
    if (preg_match('/^q(\d+)$/', $target, $m)) {
        $owner = $m[1];
        if ($owner == $uid) {
            save($db);
            send($chat, t('self_quiz', quizLink($db, $uid)), menu($LANG));
            exit;
        }
        if (!isset($db['quiz'][$owner]['ans'])) {
            save($db);
            send($chat, t('quiz_not_found'), menu($LANG));
            exit;
        }
        $db['state'][$uid] = ['mode' => 'qtake', 'owner' => $owner, 'step' => 0, 'ans' => []];
        save($db);
        $ownerName = $db['users'][$owner]['name'] ?? '';
        showQ($chat, 0, 't', t('take_intro', htmlspecialchars($ownerName)), quizQs($db['quiz'][$owner], $LANG));
        exit;
    }

    // === Anonim havola: ?start=123 ===
    if ($target !== '' && ctype_digit($target)) {
        if ($target == $uid) {
            save($db);
            send($chat, t('self_anon'), menu($LANG));
            exit;
        }
        if (!isset($db['users'][$target])) {
            save($db);
            send($chat, t('no_user'), menu($LANG));
            exit;
        }
        if (in_array($uid, $db['blocked'][$target] ?? [])) {
            save($db);
            send($chat, t('blocked_you'));
            exit;
        }
        $db['state'][$uid] = ['mode' => 'ask', 'to' => $target];
        save($db);
        send($chat, t('anon_start'));
        exit;
    }

    // === Oddiy /start (yoki ref havolasi) ===
    save($db);
    send($chat, t('welcome', htmlspecialchars($from['first_name'] ?? '')) . footer(), menu($LANG));
    if (empty($db['users'][$uid]['lang'])) {
        send($chat, t('lang_choose'), langKeyboard());
    }
    exit;
}

// ---------- /cancel ----------
if ($text === '/cancel') {
    unset($db['state'][$uid]);
    save($db);
    send($chat, t('cancelled'), menu($LANG));
    exit;
}

// ---------- Admin buyruqlari ----------
if ($uid == ADMIN_ID && $text === '/admin') {
    $quizCount = 0;
    foreach ($db['quiz'] as $qq) if (isset($qq['ans'])) $quizCount++;
    send($chat, "👑 <b>Admin panel</b>\n\n👥 Foydalanuvchilar: " . count($db['users']) .
        "\n📨 Anonim xabarlar: " . count($db['msgs']) . "\n🎯 Yaratilgan testlar: " . $quizCount .
        "\n\n📣 Reklama yuborish: /broadcast");
    exit;
}
if ($uid == ADMIN_ID && $text === '/broadcast') {
    $db['state'][$uid] = ['mode' => 'bc'];
    save($db);
    send($chat, "📣 Hamma foydalanuvchilarga yuboriladigan xabarni yuboring (matn, rasm, video, hammasi bo'ladi).\nBekor qilish: /cancel");
    exit;
}

// ---------- Menyu tugmalari ----------
$bk = btnKey($text);

if ($bk === 'b_quiz') {
    if (isset($db['quiz'][$uid]['ans'])) {
        $link = quizLink($db, $uid);
        send($chat, t('quiz_exists', $link, count($db['quiz'][$uid]['results'] ?? [])), ['inline_keyboard' => [
            [['text' => t('btn_share'), 'url' => shareUrl($link, t('share_text'))]],
            [['text' => t('btn_redo_inline'), 'callback_data' => 'mk']],
        ]]);
    } else {
        showChoice($chat, false);
    }
    exit;
}

if ($bk === 'b_redo') {
    showChoice($chat, true);
    exit;
}

if ($bk === 'b_anon') {
    send($chat, t('anon_link_msg', anonLink($db, $uid)) . footer());
    exit;
}

if ($bk === 'b_qlink') {
    if (!isset($db['quiz'][$uid]['ans'])) {
        send($chat, t('no_quiz'));
    } else {
        $link = quizLink($db, $uid);
        send($chat, t('qlink_msg', $link) . footer(), ['inline_keyboard' => [
            [['text' => t('btn_share'), 'url' => shareUrl($link, t('share_text'))]],
        ]]);
    }
    exit;
}

if ($bk === 'b_res') {
    if (!isset($db['quiz'][$uid]['ans'])) {
        send($chat, t('no_quiz'));
        exit;
    }
    $res = $db['quiz'][$uid]['results'] ?? [];
    if (!$res) {
        send($chat, t('no_results', quizLink($db, $uid)));
        exit;
    }
    uasort($res, function ($a, $b) { return $b['percent'] <=> $a['percent']; });
    $out = t('res_title');
    $i = 0;
    foreach ($res as $id => $r) {
        $i++;
        if ($i > 25) break;
        $out .= medal($i) . ' ' . mention($id, $r['name'], $r['username']) . ' — <b>' . $r['percent'] . "%</b>\n";
    }
    send($chat, $out . footer());
    exit;
}

if ($bk === 'b_top') {
    $rank = [];
    foreach ($db['quiz'] as $oid => $qq) {
        $rs = $qq['results'] ?? [];
        if (!$rs) continue;
        $sum = 0;
        foreach ($rs as $r) $sum += $r['percent'];
        $rank[$oid] = ['avg' => (int)round($sum / count($rs)), 'cnt' => count($rs)];
    }
    if (!$rank) {
        send($chat, t('top_empty'));
        exit;
    }
    uasort($rank, function ($a, $b) {
        return [$b['avg'], $b['cnt']] <=> [$a['avg'], $a['cnt']];
    });
    $out = t('top_title');
    $i = 0;
    foreach ($rank as $oid => $r) {
        $i++;
        if ($i > 10) break;
        $nm = htmlspecialchars($db['users'][$oid]['name'] ?? '?');
        $un = $db['users'][$oid]['username'] ?? '';
        if ($un) $nm .= ' (@' . htmlspecialchars($un) . ')';
        $out .= t('top_line', medal($i), $nm, $r['avg'], $r['cnt']) . "\n";
    }
    send($chat, $out . footer());
    exit;
}

if ($bk === 'b_ref') {
    $list = [];
    foreach ($db['users'] as $id => $u) {
        if (($u['refs'] ?? 0) > 0) $list[$id] = $u;
    }
    uasort($list, function ($a, $b) { return $b['refs'] <=> $a['refs']; });
    $lines = '';
    $i = 0;
    foreach ($list as $id => $u) {
        $i++;
        if ($i > 10) break;
        $nm = htmlspecialchars($u['name'] ?? '?');
        if (!empty($u['username'])) $nm .= ' (@' . htmlspecialchars($u['username']) . ')';
        $lines .= t('ref_line', medal($i), $nm, $u['refs']) . "\n";
    }
    if ($lines === '') $lines = t('ref_empty');
    $link = refLink($db, $uid);
    send($chat, t('ref_msg', $link, $db['users'][$uid]['refs'] ?? 0, $lines) . footer(), ['inline_keyboard' => [
        [['text' => t('btn_share'), 'url' => shareUrl($link, t('share_text'))]],
    ]]);
    exit;
}

if ($bk === 'b_stat') {
    $u = $db['users'][$uid];
    send($chat, t('stat', $u['received'], $u['sent'], count($db['quiz'][$uid]['results'] ?? []), $u['refs'] ?? 0));
    exit;
}

if ($bk === 'b_lang') {
    send($chat, t('lang_choose'), langKeyboard());
    exit;
}

if ($bk === 'b_help') {
    send($chat, t('help') . footer());
    exit;
}

// ==================================================
//  HOLATGA QARAB
// ==================================================
$st = $db['state'][$uid] ?? null;

if (!$st) {
    send($chat, t('use_menu'), menu($LANG));
    exit;
}

// ---------- Admin: reklama xabarini qabul qilish ----------
if ($st['mode'] === 'bc' && $uid == ADMIN_ID) {
    $db['state'][$uid] = ['mode' => 'bcw', 'mid' => $mid];
    save($db);
    api('copyMessage', ['chat_id' => $chat, 'from_chat_id' => $chat, 'message_id' => $mid]);
    send($chat, "☝️ Shu xabar <b>" . count($db['users']) . "</b> ta foydalanuvchiga yuboriladi. Tasdiqlaysizmi?", ['inline_keyboard' => [[
        ['text' => '✅ Yuborish', 'callback_data' => 'bcy'],
        ['text' => '❌ Bekor qilish', 'callback_data' => 'bcn'],
    ]]]);
    exit;
}

// ---------- Test savollariga javob (tugma bosish kerak) ----------
if ($st['mode'] === 'qmake' || $st['mode'] === 'qtake' || $st['mode'] === 'bcw') {
    send($chat, t('press_btn'));
    exit;
}

// ---------- O'z savollarini yozish ----------
if ($st['mode'] === 'cq') {
    $ph = $st['phase'];

    if ($ph === 'text') {
        $q = trim(mb_substr($text, 0, 150));
        if ($q === '') {
            send($chat, t('cq_text_err'));
            exit;
        }
        $st['cur'] = ['q' => $q];
        $st['phase'] = 'opts';
        $db['state'][$uid] = $st;
        save($db);
        send($chat, t('cq_opts'));
        exit;
    }

    if ($ph === 'opts') {
        $lines = [];
        foreach (explode("\n", $text) as $ln) {
            $ln = trim($ln);
            if ($ln !== '') $lines[] = mb_substr($ln, 0, 40);
        }
        if (count($lines) < 2 || count($lines) > 4) {
            send($chat, t('cq_opts_err'));
            exit;
        }
        $st['cur']['o'] = $lines;
        $st['phase'] = 'ans';
        $db['state'][$uid] = $st;
        save($db);
        $rows = [];
        foreach ($lines as $i => $o) {
            $rows[] = [['text' => $o, 'callback_data' => 'c:' . $i]];
        }
        send($chat, t('cq_pick', htmlspecialchars($st['cur']['q'])), ['inline_keyboard' => $rows]);
        exit;
    }

    send($chat, t('press_btn'));
    exit;
}

// ---------- Anonim savol yuborish ----------
if ($st['mode'] === 'ask') {
    $target = $st['to'];

    if (in_array($uid, $db['blocked'][$target] ?? [])) {
        unset($db['state'][$uid]);
        save($db);
        send($chat, t('blocked_you'));
        exit;
    }

    $tl = ($db['users'][$target]['lang'] ?? '') ?: 'uz';
    $db['counter']++;
    $n = $db['counter'];
    $db['msgs'][$n] = ['from' => $uid, 'to' => $target, 'src' => $mid];

    api('sendMessage', [
        'chat_id' => $target,
        'text' => T($tl, 'new_anon', $n),
        'parse_mode' => 'HTML',
    ]);
    $r = api('copyMessage', [
        'chat_id' => $target,
        'from_chat_id' => $chat,
        'message_id' => $mid,
        'reply_markup' => ['inline_keyboard' => [[
            ['text' => T($tl, 'btn_reply'), 'callback_data' => 'r:' . $n],
            ['text' => T($tl, 'btn_block'), 'callback_data' => 'b:' . $n],
        ]]],
    ]);

    unset($db['state'][$uid]);
    if (!empty($r['ok'])) {
        $db['users'][$target]['received']++;
        $db['users'][$uid]['sent']++;
        save($db);
        send($chat, t('anon_sent', anonLink($db, $uid)), menu($LANG));
    } else {
        unset($db['msgs'][$n]);
        save($db);
        send($chat, t('anon_fail'));
    }
    exit;
}

// ---------- Javob berish ----------
if ($st['mode'] === 'reply') {
    $n = $st['n'];
    if (!isset($db['msgs'][$n])) {
        unset($db['state'][$uid]);
        save($db);
        exit;
    }
    $asker = $db['msgs'][$n]['from'];
    $al = ($db['users'][$asker]['lang'] ?? '') ?: 'uz';

    api('sendMessage', [
        'chat_id' => $asker,
        'text' => T($al, 'reply_head'),
        'parse_mode' => 'HTML',
        'reply_to_message_id' => $db['msgs'][$n]['src'],
        'allow_sending_without_reply' => true,
    ]);
    $r = api('copyMessage', [
        'chat_id' => $asker,
        'from_chat_id' => $chat,
        'message_id' => $mid,
        'reply_markup' => ['inline_keyboard' => [[
            ['text' => T($al, 'btn_again'), 'callback_data' => 'a:' . $uid],
        ]]],
    ]);

    unset($db['state'][$uid]);
    save($db);
    if (!empty($r['ok'])) {
        send($chat, t('reply_sent'), menu($LANG));
    } else {
        send($chat, t('reply_fail'));
    }
    exit;
}
