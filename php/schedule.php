<?php
  require_once(__DIR__."/sketchpad.pro.php");
?>
<h1>Schedule</h1>
<?php
// Keys
$YEAR = 2020;
$WEEK_NO = 12;
$GROUP_NO = "III B";

$PANELS = [
  "8<sup>00</sup> - 8<sup>45</sup>",
  "8<sup>55</sup> - 9<sup>40</sup>",
  "9<sup>50</sup> - 10<sup>35</sup>",
  "10<sup>45</sup> - 11<sup>30</sup>",
  "11<sup>50</sup> - 12<sup>35</sup>",
  "12<sup>45</sup> - 13<sup>30</sup>",
  "13<sup>40</sup> - 14<sup>25</sup>",
  "14<sup>35</sup> - 15<sup>20</sup>",
  "15<sup>40</sup> - 16<sup>25</sup>",
  "KONIEC ZAJĘĆ",
];

$SCHEDULE = [
  ['', 'chemia', 'chemia', 'polski', 'polski', 'fizyka'],
  ['', '', '', 'niemiecki', 'polski', 'polski', 'wf'],
  ['', 'historia', 'historia', 'g. wych.', 'geografia', 'wf', 'wf'],
  ['biologia', 'bilogia', 'wos', 'matematyka', 'matematyka', 'angielski native', 'niemiecki', 'informatyka', 'informatyka'],
  ['religia', 'religia', 'kształcenie zawodowe', 'kształcenie zawodowe', 'angielski', 'matematyka'],
];


function getRoomButton($weekday, $subject) {
  global $YEAR;
  global $WEEK_NO;
  global $GROUP_NO;
  return "<button class=\"open-room\" data-room=\"".generateSketchpadRoomFromString("${YEAR}-${WEEK_NO}-${weekday}-${GROUP_NO}-${subject}")."\">"."&nbsp;🚪</button>";
}

function getScheduleRow($time, $line, $cols) {
  global $SCHEDULE;

  $result = [];
  array_push($result, "<tr>");
  array_push($result, "<th  class=\"no\">".($line + 1).".</th>");
  array_push($result, "<th class=\"time\">${time}</th>");
  for ($col = 0; $col < $cols; $col += 1) {
    $subject = $SCHEDULE[$col][$line];
    if ($subject) {
      array_push($result,
        "<td class=\"subject\">".$subject."</td>",
        "<td class=\"room\">".getRoomButton($col, $subject)."</td>"
      );
    } else {
      array_push($result,
        "<td class=\"subject\">&nbsp;</td>",
        "<td class=\"room\">&nbsp;</td>");
    }
  }
  array_push($result, "</tr>");
  return join('', $result);
}

?>
<table class="schedule">
    <thead>
        <tr>
            <th class="title" colspan="12">Plan lekcji klasy <strong><?php echo $GROUP_NO ?></strong>, tydzień <strong><?php echo $WEEK_NO ?></strong></th>
        </tr>
        <tr>
            <th class="no">lp</th>
            <th class="time">Godzina</th>
            <th class="weekday">Poniedziałek</th>
            <th class="room">Sala</th>
            <th class="weekday">Wtorek</th>
            <th class="room">Sala</th>
            <th class="room">Środa</th>
            <th class="room">Sala</th>
            <th class="weekday">Czwartek</th>
            <th class="room">Sala</th>
            <th class="weekday">Piątek</th>
            <th class="room">Sala</th>
        </tr>
    </thead>
    <tbody>
      <?php
        for ($p = 0; $p < count($PANELS); $p += 1) {
          echo getScheduleRow($PANELS[$p], $p, count($SCHEDULE));
        }
      ?>
    </tbody>
</table>
