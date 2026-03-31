#include<iostream>
using namespace std;

int main() {
  int n; // カード枚数
  int cards[4][14] = {{}, {}, {}, {}};
  char suit;
  int number;

  cin >> n;

  for (int i = 0; i < n; i++) {
    cin >> suit >> number;
    if (suit == 'S') cards[0][number] = 1;
    else if (suit == 'H') cards[1][number] = 1;
    else if (suit == 'C') cards[2][number] = 1;
    else if (suit == 'D') cards[3][number] = 1;
  }

  for (int i = 0; i < 4; i++) {
    for (int j = 1; j < 14; j++) {
      if (cards[i][j] == 0) {
        if (i == 0) cout << 'S' << ' ' << j << endl;
        else if (i == 1) cout << 'H' << ' ' << j << endl;
        else if (i == 2) cout << 'C' << ' ' << j << endl;
        else if (i == 3) cout << 'D' << ' ' << j << endl;
      }
    }
  }
        
  return 0;
}
