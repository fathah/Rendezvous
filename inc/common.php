<?php


function getGroupName($code)
{
  global $conn;
  if (isset($code)) {
    $sql = "SELECT name FROM team WHERE code='$code'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    if (strlen($row['name']) > 0) {
      return $row['name'];
    } else {
      return "Unknown";
    }
  }
}


function getCampusName($campus)
{
  switch ($campus) {
    case "mnc":
      return "Madeenathunnoor";
      break;
    case "mir":
      return "Madrasathu Imam Rabbani";
      break;

    case "dhic":
      return "Darul Hidaya";
      break;
    case "isc":
      return "Imam Shafi College";
      break;
    case "qck":
      return "Qadiriyya College";
      break;
    case "mne":
      return "Markazu Nnajath";
      break;
    case "iv":
      return "Isra";
      break;
    case "dkk":
      return "Dalailul Khairath";
      break;
    case "imk":
      return "Al Munavvara";
      break;
    case "osec":
      return " Shuhada Edu Campus";
      break;
    case "jcc":
      return "Jamalullaily Complex";
      break;
    case "mbc":
      return "Markaz Al Bilal";
      break;
    case "azt":
      return "Al Zahra";
      break;
    case "bin":
      return "Baithul Izza";
      break;
    case "mnhj":
      return "Manhaj";
      break;
    case "hsn":
      return "Hasaniyya";
      break;
    case "drn":
      return "Markaz Dhunnurain";
      break;
    case "other":
      return "Other Campus";
      break;
    default:
      return "Unknown";
  }
}


function getSection($sec)
{
  switch ($sec) {
    case 'pr':
      return "Primary";
      break;
      case 'sc':
        return "Secondary";
        break;
        case 'sj':
          return "Sub Junior";
          break;
        case 'jr':
          return "Junior";
          break;
         
    case 'sn':
      return "Senior";
      break;
    
      
        case 'gn':
          return "General";
          break;
    default:
      return "Unknown";
      break;
  }
}




function getGroupList($conn)
{
  if (isset($code)) {
    $sql = "SELECT name FROM team";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    if (strlen($row['name']) > 0) {
      return $row['name'];
    } else {
      return "Unknown";
    }
  }
}

function getProgramType($code)
{
  if ($code == 's') {
    return "Individual";
  } else {
    return "Group";
  }
}


function getPoint($rank, $grade, bool $isGroup, $programName)
{
  if ($programName == "CASE STUDY" || $programName == "RISALA CREATION" || $programName == "TUG OF WAR") {
    switch ($grade) {
      case 'APLUS':
        if ($rank == 1) {
          return 32;
        } elseif ($rank == 2) {
          return 29;
        } elseif ($rank == 3) {
          return 27;
        } else {
          return 17;
        }
        break;
      case 'A':
        if ($rank == 1) {
          return 30;
        } elseif ($rank == 2) {
          return 27;
        } elseif ($rank == 3) {
          return 25;
        } else {
          return 15;
        }
        break;
      case 'B':
        if ($rank == 1) {
          return 27;
        } elseif ($rank == 2) {
          return 24;
        } elseif ($rank == 3) {
          return 22;
        } else {
          return 12;
        }
        break;



      default:
        if ($rank == 1) {
          return 25;
        } elseif ($rank == 2) {
          return 22;
        } elseif ($rank == 3) {
          return 20;
        } else {
          return 10;
        }
        break;
    }
  } else {
    switch ($grade) {
      case 'APLUS':
        if ($rank == 1) {
          if ($isGroup) {
            return 22;
          } else {
            return 11;
          }
        } elseif ($rank == 2) {
          if ($isGroup) {
            return 19;
          } else {
            return 9;
          }
        } elseif ($rank == 3) {
          if ($isGroup) {
            return 17;
          } else {
            return 7;
          }
        } else {
          if ($isGroup) {
            return 12;
          } else {
            return 6;
          }
        }
        break;
      case 'A':
        if ($rank == 1) {
          if ($isGroup) {
            return 20;
          } else {
            return 10;
          }
        } elseif ($rank == 2) {
          if ($isGroup) {
            return 17;
          } else {
            return 8;
          }
        } elseif ($rank == 3) {
          if ($isGroup) {
            return 15;
          } else {
            return 6;
          }
        } else {
          if ($isGroup) {
            return 10;
          } else {
            return 5;
          }
        }
        break;
      case 'B':
        if ($rank == 1) {
          if ($isGroup) {
            return 17;
          } else {
            return 8;
          }
        } elseif ($rank == 2) {
          if ($isGroup) {
            return 14;
          } else {
            return 6;
          }
        } elseif ($rank == 3) {
          if ($isGroup) {
            return 12;
          } else {
            return 4;
          }
        } else {
          if ($isGroup) {
            return 7;
          } else {
            return 3;
          }
        }
        break;
case 'C':
  if ($rank == 1) {
    if ($isGroup) {
      return 15;
    } else {
      return 6;
    }
  } elseif ($rank == 2) {
    if ($isGroup) {
      return 12;
    } else {
      return 4;
    }
  } elseif ($rank == 3) {
    if ($isGroup) {
      return 10;
    } else {
      return 2;
    }
  } else {
    if ($isGroup) {
      return 5;
    } else {
      return 1;
    }
  }
  break;


      default:
        if ($rank == 1) {
          if ($isGroup) {
            return 10;
          } else {
            return 5;
          }
        } elseif ($rank == 2) {
          if ($isGroup) {
            return 7;
          } else {
            return 3;
          }
        } elseif ($rank == 3) {
          if ($isGroup) {
            return 5;
          } else {
            return 1;
          }
        } else {
          if ($isGroup) {
            return 0;
          } else {
            return 0;
          }
        }
        break;
    }
  }
}
