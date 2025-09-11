#include<iostream>
using namespace std;

char getGrade(int m, int f, int r) {
  if (m == -1 || f == -1) return 'F';

  // 正規化
  if (m == -1) m = 0;
  if (f == -1) f = 0;
  if (r == -1) r = 0;

  int sum = 0;
  sum = m + f;

  if (sum >= 80) return 'A';
  else if (sum >= 65 && sum < 80) return 'B';
  else if (sum >= 50 && sum < 65) return 'C';
  else if (sum >= 30 && sum < 50) {
    if (r >= 50) return 'C';
    return 'D';
  }
  else if (sum < 30) return 'F';

  return 'F';
}

int main() {
  int m, f, r;

  while(1) {
    cin >> m >> f >> r;
    if (m == -1 && f == -1 && r == -1) break;

    cout << getGrade(m, f, r) << endl;
  }

  return 0;
}
