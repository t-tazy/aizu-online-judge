#include<iostream>
#include<string>
using namespace std;

int main() {
  int n, playerAPoint = 0, playerBPoint = 0;
  string playerA, playerB;

  cin >> n;

  for (int i = 0; i < n; i++) {
    cin >> playerA >> playerB;
    if (playerA == playerB) {
      playerAPoint++;
      playerBPoint++;
    } else if (playerA < playerB) {
      playerBPoint += 3;
    } else {
      playerAPoint += 3;
    }
  }

  cout << playerAPoint << ' ' << playerBPoint << endl;

  return 0;
}
