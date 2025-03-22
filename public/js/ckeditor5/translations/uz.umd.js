/**
 * @license Copyright (c) 2003-2025, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-licensing-options
 */

( e => {
const { [ 'uz' ]: { dictionary, getPluralForm } } = {"uz":{"dictionary":{"Words: %0":"","Characters: %0":"","Widget toolbar":"Vidjet asboblar paneli","Insert paragraph before block":"Blokdan oldin paragrafni kiritish","Insert paragraph after block":"Вblokdan keyin paragraf qo'yish","Press Enter to type after or press Shift + Enter to type before the widget":"","Keystrokes that can be used when a widget is selected (for example: image, table, etc.)":"","Insert a new paragraph directly after a widget":"","Insert a new paragraph directly before a widget":"","Move the caret to allow typing directly before a widget":"","Move the caret to allow typing directly after a widget":"","Move focus from an editable area back to the parent widget":"","Upload in progress":"Yuklanmoqda","Undo":"Bekor qilish","Redo":"Takrorlash","Rich Text Editor":"Tahrirlovchi","Edit block":"Blokni tahrirlash","Click to edit block":"","Drag to move":"","Next":"Keyingi","Previous":"Oldingi","Editor toolbar":"Tahrirlovchi asboblar paneli","Dropdown toolbar":"Ochiladigan asboblar paneli","Dropdown menu":"","Black":"Qora","Dim grey":"To'q kulrang","Grey":"Kulrang","Light grey":"Och kulrang","White":"Oq","Red":"Qizil","Orange":"To'q sariq","Yellow":"Sariq","Light green":"Och yashil","Green":"Yashil","Aquamarine":"Akuamarin","Turquoise":"Turkuaz","Light blue":"Moviy","Blue":"Ko'k","Purple":"Siyohrang","Editor block content toolbar":"","Editor contextual toolbar":"","HEX":"","No results found":"","No searchable items":"","Editor dialog":"","Close":"","Help Contents. To close this dialog press ESC.":"","Below, you can find a list of keyboard shortcuts that can be used in the editor.":"","(may require <kbd>Fn</kbd>)":"","Accessibility":"","Accessibility help":"","Press %0 for help.":"","Move focus in and out of an active dialog window":"","MENU_BAR_MENU_FILE":"","MENU_BAR_MENU_EDIT":"","MENU_BAR_MENU_VIEW":"","MENU_BAR_MENU_INSERT":"Kiritish","MENU_BAR_MENU_FORMAT":"","MENU_BAR_MENU_TOOLS":"","MENU_BAR_MENU_HELP":"","MENU_BAR_MENU_TEXT":"","MENU_BAR_MENU_FONT":"","Editor menu bar":"","Please enter a valid color (e.g. \"ff0000\").":"","Styles":"","Multiple styles":"","Block styles":"","Text styles":"","Insert table":"Jadvalni kiritish","Header column":"Ustun sarlavhalari","Insert column left":"Ustunni chapga kiritish","Insert column right":"Ustunni o'ngga kiritish","Delete column":"Ustunni o'chirish","Select column":"Ustunni tanlash","Column":"Ustun","Header row":"Sarlavhalar satri","Insert row below":"Pastga qatorni kiritish","Insert row above":"Yuqoriga qatorni kiritish","Delete row":"Satrni o'chirish","Select row":"Satrni tanlang","Row":"Satr","Merge cell up":"Yuqoridagi katak bilan birlashtirish","Merge cell right":"O'ngdagi katakcha bilan birlashtirish","Merge cell down":"Pastdagi katak bilan birlashtirish","Merge cell left":"Chapdagi katakcha bilan birlashtirish","Split cell vertically":"Hujayrani vertikal ravishda ajratish","Split cell horizontally":"Hujayrani gorizontal ravishda ajratish","Merge cells":"Hujayralarni birlashtirish","Table toolbar":"Jadval asboblar paneli","Table properties":"Jadvalning xususiyatlari","Cell properties":"Hujayra xususiyatlari","Border":"Chegara","Style":"Uslub","Width":"Kengligi","Height":"Balandligi","Color":"Rang","Background":"Fon","Padding":"Chekinish","Dimensions":"O'lchamlar","Table cell text alignment":"Jadval katakchasidagi matnni tekislash","Alignment":"Tekislash","Horizontal text alignment toolbar":"Matnni gorizontal tekislash asboblar paneli","Vertical text alignment toolbar":"Vertikal matnni tekislash asboblar paneli","Table alignment toolbar":"Jadvalni tekislash asboblar paneli","None":"Yo'q","Solid":"Qattiq","Dotted":"Nuqta","Dashed":"Nuqtali","Double":"Ikkitalik","Groove":"Yivli","Ridge":"Qirrali","Inset":"Tushkunlikka tushgan","Outset":"Qavariq","Align cell text to the left":"Matnni chapga tekislash","Align cell text to the center":"Matnni markazga tekislash","Align cell text to the right":"Matnni o'ngga tekislash","Justify cell text":"Matnni kenglikka tekislash","Align cell text to the top":"Hujayra matnini tepaga tekislash","Align cell text to the middle":"Hujayra matnini markazga tekislash","Align cell text to the bottom":"Hujayra matnini pastga tekislash","Align table to the left":"Jadvalni chap tomonga tekislash","Center table":"Jadvalni markazga tekislash","Align table to the right":"Jadvalni o'ngga tekislash","The color is invalid. Try \"#FF0000\" or \"rgb(255,0,0)\" or \"red\".":"Noto'g'ri rang. \\ \"# FF0000 \\\" yoki \\ \"rgb (255,0,0) \\\" yoki \\ \"red \\\" ni sinab ko'ring.","The value is invalid. Try \"10px\" or \"2em\" or simply \"2\".":"Noto'g'ri qiymat. \\ \"10px \\\" yoki \\ \"2em \\\" yoki shunchaki \\ \"2 \\\" ni sinab ko'ring.","Enter table caption":"","Keystrokes that can be used in a table cell":"","Move the selection to the next cell":"","Move the selection to the previous cell":"","Insert a new table row (when in the last cell of a table)":"","Navigate through the table":"","Table":"","Special characters":"Maxsus belgilar","Category":"","All":"","Arrows":"","Currency":"","Latin":"","Mathematical":"","Text":"","leftwards simple arrow":"","rightwards simple arrow":"","upwards simple arrow":"","downwards simple arrow":"","leftwards double arrow":"","rightwards double arrow":"","upwards double arrow":"","downwards double arrow":"","leftwards dashed arrow":"","rightwards dashed arrow":"","upwards dashed arrow":"","downwards dashed arrow":"","leftwards arrow to bar":"","rightwards arrow to bar":"","upwards arrow to bar":"","downwards arrow to bar":"","up down arrow with base":"","back with leftwards arrow above":"","end with leftwards arrow above":"","on with exclamation mark with left right arrow above":"","soon with rightwards arrow above":"","top with upwards arrow above":"","Dollar sign":"","Euro sign":"","Yen sign":"","Pound sign":"","Cent sign":"","Euro-currency sign":"","Colon sign":"","Cruzeiro sign":"","French franc sign":"","Lira sign":"","Currency sign":"","Bitcoin sign":"","Mill sign":"","Naira sign":"","Peseta sign":"","Rupee sign":"","Won sign":"","New sheqel sign":"","Dong sign":"","Kip sign":"","Tugrik sign":"","Drachma sign":"","German penny sign":"","Peso sign":"","Guarani sign":"","Austral sign":"","Hryvnia sign":"","Cedi sign":"","Livre tournois sign":"","Spesmilo sign":"","Tenge sign":"","Indian rupee sign":"","Turkish lira sign":"","Nordic mark sign":"","Manat sign":"","Ruble sign":"","Latin capital letter a with macron":"","Latin small letter a with macron":"","Latin capital letter a with breve":"","Latin small letter a with breve":"","Latin capital letter a with ogonek":"","Latin small letter a with ogonek":"","Latin capital letter c with acute":"","Latin small letter c with acute":"","Latin capital letter c with circumflex":"","Latin small letter c with circumflex":"","Latin capital letter c with dot above":"","Latin small letter c with dot above":"","Latin capital letter c with caron":"","Latin small letter c with caron":"","Latin capital letter d with caron":"","Latin small letter d with caron":"","Latin capital letter d with stroke":"","Latin small letter d with stroke":"","Latin capital letter e with macron":"","Latin small letter e with macron":"","Latin capital letter e with breve":"","Latin small letter e with breve":"","Latin capital letter e with dot above":"","Latin small letter e with dot above":"","Latin capital letter e with ogonek":"","Latin small letter e with ogonek":"","Latin capital letter e with caron":"","Latin small letter e with caron":"","Latin capital letter g with circumflex":"","Latin small letter g with circumflex":"","Latin capital letter g with breve":"","Latin small letter g with breve":"","Latin capital letter g with dot above":"","Latin small letter g with dot above":"","Latin capital letter g with cedilla":"","Latin small letter g with cedilla":"","Latin capital letter h with circumflex":"","Latin small letter h with circumflex":"","Latin capital letter h with stroke":"","Latin small letter h with stroke":"","Latin capital letter i with tilde":"","Latin small letter i with tilde":"","Latin capital letter i with macron":"","Latin small letter i with macron":"","Latin capital letter i with breve":"","Latin small letter i with breve":"","Latin capital letter i with ogonek":"","Latin small letter i with ogonek":"","Latin capital letter i with dot above":"","Latin small letter dotless i":"","Latin capital ligature ij":"","Latin small ligature ij":"","Latin capital letter j with circumflex":"","Latin small letter j with circumflex":"","Latin capital letter k with cedilla":"","Latin small letter k with cedilla":"","Latin small letter kra":"","Latin capital letter l with acute":"","Latin small letter l with acute":"","Latin capital letter l with cedilla":"","Latin small letter l with cedilla":"","Latin capital letter l with caron":"","Latin small letter l with caron":"","Latin capital letter l with middle dot":"","Latin small letter l with middle dot":"","Latin capital letter l with stroke":"","Latin small letter l with stroke":"","Latin capital letter n with acute":"","Latin small letter n with acute":"","Latin capital letter n with cedilla":"","Latin small letter n with cedilla":"","Latin capital letter n with caron":"","Latin small letter n with caron":"","Latin small letter n preceded by apostrophe":"","Latin capital letter eng":"","Latin small letter eng":"","Latin capital letter o with macron":"","Latin small letter o with macron":"","Latin capital letter o with breve":"","Latin small letter o with breve":"","Latin capital letter o with double acute":"","Latin small letter o with double acute":"","Latin capital ligature oe":"","Latin small ligature oe":"","Latin capital letter r with acute":"","Latin small letter r with acute":"","Latin capital letter r with cedilla":"","Latin small letter r with cedilla":"","Latin capital letter r with caron":"","Latin small letter r with caron":"","Latin capital letter s with acute":"","Latin small letter s with acute":"","Latin capital letter s with circumflex":"","Latin small letter s with circumflex":"","Latin capital letter s with cedilla":"","Latin small letter s with cedilla":"","Latin capital letter s with caron":"","Latin small letter s with caron":"","Latin capital letter t with cedilla":"","Latin small letter t with cedilla":"","Latin capital letter t with caron":"","Latin small letter t with caron":"","Latin capital letter t with stroke":"","Latin small letter t with stroke":"","Latin capital letter u with tilde":"","Latin small letter u with tilde":"","Latin capital letter u with macron":"","Latin small letter u with macron":"","Latin capital letter u with breve":"","Latin small letter u with breve":"","Latin capital letter u with ring above":"","Latin small letter u with ring above":"","Latin capital letter u with double acute":"","Latin small letter u with double acute":"","Latin capital letter u with ogonek":"","Latin small letter u with ogonek":"","Latin capital letter w with circumflex":"","Latin small letter w with circumflex":"","Latin capital letter y with circumflex":"","Latin small letter y with circumflex":"","Latin capital letter y with diaeresis":"","Latin capital letter z with acute":"","Latin small letter z with acute":"","Latin capital letter z with dot above":"","Latin small letter z with dot above":"","Latin capital letter z with caron":"","Latin small letter z with caron":"","Latin small letter long s":"","Less-than sign":"","Greater-than sign":"","Less-than or equal to":"","Greater-than or equal to":"","En dash":"","Em dash":"","Macron":"","Overline":"","Degree sign":"","Minus sign":"","Plus-minus sign":"","Division sign":"","Fraction slash":"","Multiplication sign":"","Latin small letter f with hook":"","Integral":"","N-ary summation":"","Infinity":"","Square root":"","Tilde operator":"","Approximately equal to":"","Almost equal to":"","Not equal to":"","Identical to":"","Element of":"","Not an element of":"","Contains as member":"","N-ary product":"","Logical and":"","Logical or":"","Not sign":"","Intersection":"","Union":"","Partial differential":"","For all":"","There exists":"","Empty set":"","Nabla":"","Asterisk operator":"","Proportional to":"","Angle":"","Vulgar fraction one quarter":"","Vulgar fraction one half":"","Vulgar fraction three quarters":"","Single left-pointing angle quotation mark":"","Single right-pointing angle quotation mark":"","Left-pointing double angle quotation mark":"","Right-pointing double angle quotation mark":"","Left single quotation mark":"","Right single quotation mark":"","Left double quotation mark":"","Right double quotation mark":"","Single low-9 quotation mark":"","Double low-9 quotation mark":"","Inverted exclamation mark":"","Inverted question mark":"","Two dot leader":"","Horizontal ellipsis":"","Double dagger":"","Per mille sign":"","Per ten thousand sign":"","Double exclamation mark":"","Question exclamation mark":"","Exclamation question mark":"","Double question mark":"","Copyright sign":"","Registered sign":"","Trade mark sign":"","Section sign":"","Paragraph sign":"","Reversed paragraph sign":"","Show source":"","Show blocks":"","Select all":"Hammasini tanlash","Disable editing":"Tahrirlashni o‘chirib qo‘yish","Enable editing":"Tahrirlashga ruxsat berish","Previous editable region":"Avvalgi tahrirlanadigan hudud","Next editable region":"Keyingi tahrirlanadigan hudud","Navigate editable regions":"Tahrirlanadigan hududlar boʻylab navigatsiya","Remove Format":"Formatlashni olib tashlash","Page break":"Sahifalar uzilishi","media widget":"media vidjeti","Media URL":"Media URL manzili","Paste the media URL in the input.":"Media URL manzilini kiritish maydoniga joylashtiring.","Tip: Paste the URL into the content to embed faster.":"Maslahat: Tez kiritish uchun URL manzilini kontentga joylashtiring.","The URL must not be empty.":"URL bo'sh bo'lmasligi kerak.","This media URL is not supported.":"Ushbu media URL manzili qo‘llab-quvvatlanmaydi.","Insert media":"Mediani joylashtiring","Media":"","Media toolbar":"Media asboblar paneli","Open media in new tab":"","Numbered List":"Raqamlangan ro'yxat","Bulleted List":"Belgilangan roʻyxat","To-do List":"","Bulleted list styles toolbar":"Belgilangan ro'yxat uslublari","Numbered list styles toolbar":"Raqamlangan ro'yxat uslublari","Toggle the disc list style":"","Toggle the circle list style":"","Toggle the square list style":"","Toggle the decimal list style":"","Toggle the decimal with leading zero list style":"","Toggle the lower–roman list style":"","Toggle the upper–roman list style":"","Toggle the lower–latin list style":"","Toggle the upper–latin list style":"","Disc":"Disk","Circle":"Doira","Square":"Kvadrat","Decimal":"O'nlik","Decimal with leading zero":"Boshlovchi nol bilan oʻnlik","Lower–roman":"Kichik rim","Upper-roman":"Katta rim","Lower-latin":"Kichik lotincha","Upper-latin":"Katta lotincha","List properties":"","Start at":"","Invalid start index value.":"","Start index must be greater than 0.":"","Reversed order":"","Keystrokes that can be used in a list":"","Increase list item indent":"","Decrease list item indent":"","Entering a to-do list":"","Leaving a to-do list":"","Unlink":"Havolani olib tashlash","Link":"Havola","Link URL":"\"Havola URL","Link URL must not be empty.":"","Link image":"Rasmga havola","Edit link":"Havolani tahrirlash","Open link in new tab":"Havolani yangi oynada ochish","This link has no URL":"Bu havola uchun URL oʻrnatilmagan","Open in a new tab":"Yangi oynada oching","Downloadable":"Yuklab olinadigan","Create link":"","Move out of a link":"","Scroll to target":"","Language":"","Choose language":"","Remove language":"","Increase indent":"chekinishni oshirish","Decrease indent":"chekinishni kamaytirish","image widget":"Tasvirlar vidjeti","Wrap text":"","Break text":"","In line":"","Side image":"Yon tasvir","Full size image":"Asl rasm hajmi","Left aligned image":"Chapga tekislash","Centered image":"Markazga tekislash","Right aligned image":"O'ngga tekislash","Change image text alternative":"Muqobil matnni tahrirlash","Text alternative":"Muqobil matn","Enter image caption":"Rasm sarlavhasi","Insert image":"Rasm kiritish","Replace image":"","Upload from computer":"","Replace from computer":"","Upload image from computer":"","Image from computer":"","From computer":"","Replace image from computer":"","Upload failed":"Yuklab olinmadi","You have no image upload permissions.":"","Image toolbar":"Rasm asboblari paneli","Resize image":"Rasm hajmini o'zgartirish","Resize image to %0":"Rasm hajmini %0 ga o‘zgartirish","Resize image to the original size":"Rasmning o'lchamini asl o'lchamiga o'zgartiring","Resize image (in %0)":"","Original":"Asl","Custom image size":"","Custom":"","Image resize list":"Hajmlar ro'yxati","Insert image via URL":"Rasmni URL orqali kiritish","Insert via URL":"","Image via URL":"","Via URL":"","Update image URL":"Rasm URL manzilini o'zgartirish","Caption for the image":"","Caption for image: %0":"","The value must not be empty.":"","The value should be a plain number.":"","Uploading image":"","Image upload complete":"","Error during image upload":"","Image":"","HTML object":"","Insert HTML":"HTML kiritish","HTML snippet":"HTML snippet","Paste raw HTML here...":"HTML kodini shu yerga joylashtiring...","Edit source":"Kodni o'zgartirish","Save changes":"O'zgarishlarni saqlash","No preview available":"","Empty snippet content":"","Horizontal line":"Gorizontal chiziq","Yellow marker":"Sariq marker bilan ta'kidlash","Green marker":"Yashil marker bilan ta'kidlash","Pink marker":"Pushti rang markeri bilan belgilang","Blue marker":"Moviy rang markeri bilan ajratib ko'rsatish","Red pen":"Matn rangi qizil","Green pen":"Matn rangi yashil","Remove highlight":"Ajratishni olib tashlash","Highlight":"Ajratish","Text highlight toolbar":"Matn tanlash asboblar paneli","Heading":"Uslub","Choose heading":"Uslubni tanlash","Heading 1":"Sarlavha 1","Heading 2":"Sarlavha 2","Heading 3":"Sarlavha 3","Heading 4":"Sarlavha 4","Heading 5":"Sarlavha 5","Heading 6":"Sarlavha 6","Type your title":"Sarlavhani kiriting","Type or paste your content here.":"Matningizni shu yerga kiriting yoki joylashtiring","Font Size":"Shrift hajmi","Tiny":"Juda kichik","Small":"Kichik","Big":"Katta","Huge":"Juda katta","Font Family":"Shriftlar oilasi","Default":"Standart","Font Color":"Shrift rangi","Font Background Color":"Fon rangi","Document colors":"Sahifa rangi","Find and replace":"","Find in text…":"","Find":"","Previous result":"","Next result":"","Replace":"","Replace all":"","Match case":"","Whole words only":"","Replace with…":"","Text to find must not be empty.":"","Tip: Find some text first in order to replace it.":"","Advanced options":"","Find in the document":"","Insert a soft break (a <code>&lt;br&gt;</code> element)":"","Insert a hard break (a new paragraph)":"","Emoji":"","Show all emoji...":"","Find an emoji (min. 2 characters)":"","No emojis were found matching \"%0\".":"","Keep on typing to see the emoji.":"","The query must contain at least two characters.":"","Smileys & Expressions":"","Gestures & People":"","Animals & Nature":"","Food & Drinks":"","Travel & Places":"","Activities":"","Objects":"","Symbols":"","Flags":"","Select skin tone":"","Default skin tone":"","Light skin tone":"","Medium Light skin tone":"","Medium skin tone":"","Medium Dark skin tone":"","Dark skin tone":"","Cancel":"Bekor qilish","Clear":"O'chirish","Remove color":"Rangni olib tashlash","Restore default":"","Save":"Saqlash","Show more items":"","%0 of %1":"","Cannot upload file:":"","Rich Text Editor. Editing area: %0":"","Insert with file manager":"","Replace with file manager":"","Insert image with file manager":"","Replace image with file manager":"","File":"","With file manager":"","Toggle caption off":"","Toggle caption on":"","Content editing keystrokes":"","These keyboard shortcuts allow for quick access to content editing features.":"","User interface and content navigation keystrokes":"","Use the following keystrokes for more efficient navigation in the CKEditor 5 user interface.":"","Close contextual balloons, dropdowns, and dialogs":"","Open the accessibility help dialog":"","Move focus between form fields (inputs, buttons, etc.)":"","Move focus to the menu bar, navigate between menu bars":"","Move focus to the toolbar, navigate between toolbars":"","Navigate through the toolbar or menu bar":"","Execute the currently focused button. Executing buttons that interact with the editor content moves the focus back to the content.":"","Accept":"","Paragraph":"Paragraf","Color picker":"Rang tanlash","Please try a different phrase or check the spelling.":"Iltimos, boshqa iborani sinab ko'ring yoki imloni tekshiring.","Source":"","Insert code block":"Kodni kiritish","Plain text":"Oddiy matn","Leaving %0 code snippet":"","Entering %0 code snippet":"","Entering code snippet":"","Leaving code snippet":"","Code block":"","Copy selected content":"","Paste content":"","Paste content as plain text":"","Insert image or file":"Rasm yoki faylni kiriting","Could not obtain resized image URL.":"Rasm hajmi o‘zgartirilgan URL manzilini olib bo‘lmadi.","Selecting resized image failed":"Tasdiqlangan o'lchamdagi rasmni tanlash muvaffaqiyatsiz tugadi","Could not insert image at the current position.":"Siz joriy joyga rasm qo'sha olmaysiz.","Inserting image failed":"Rasm qo'shish muvaffaqiyatsiz tugadi","Open file manager":"Fayl menejerini ochish","Cannot determine a category for the uploaded file.":"Yuklangan fayl uchun toifani aniqlab bo‘lmadi.","Cannot access default workspace.":"","You have no image editing permissions.":"","Edit image":"","Processing the edited image.":"","Server failed to process the image.":"","Failed to determine category of edited image.":"","Bookmark":"","Insert":"","Update":"","Edit bookmark":"","Remove bookmark":"","Bookmark name":"","Enter the bookmark name without spaces.":"","Bookmark must not be empty.":"","Bookmark name cannot contain space characters.":"","Bookmark name already exists.":"","bookmark widget":"","Block quote":"Iqtibos","Bold":"Qalin","Italic":"Kursiv","Underline":"Tagi chizilgan","Code":"Manba kodi","Strikethrough":"Chizilgan","Subscript":"Pastki yozuv","Superscript":"Yuqori yozuv","Italic text":"","Move out of an inline code style":"","Bold text":"","Underline text":"","Strikethrough text":"","Saving changes":"O'zgarishlarni saqlash","Revert autoformatting action":"","Align left":"Chap tomonda tekislash","Align right":"O'ng tomonda tekislash","Align center":"O'rtada tekislash","Justify":"Kengligi bo'yicha tekislash","Text alignment":"Matnni tekislash","Text alignment toolbar":"Tekislash"},getPluralForm(n){return (n > 1);}}};
e[ 'uz' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'uz' ].dictionary = Object.assign( e[ 'uz' ].dictionary, dictionary );
e[ 'uz' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );
