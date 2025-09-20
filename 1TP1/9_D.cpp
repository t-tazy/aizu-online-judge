#include<iostream>
#include<string>
using namespace std;

int main() {
  string str, command;
  int q, a, b;

  cin >> str >> q;

  for (int i = 0; i < q; i++) {
    cin >> command;

    if (command == "print") {
      cin >> a >> b;
      cout << str.substr(a, b - a + 1) << endl;
    } else if (command == "reverse") {
      cin >> a >> b;
      string reverseStr = str.substr(a, b - a + 1);
      string reversedStr = reverseStr;

      for (int i = 0; i < reverseStr.size(); i++) {
        reversedStr[i] = reverseStr[reverseStr.size() - i - 1];
      }

      str = str.replace(a, b - a + 1, reversedStr);
    } else if (command == "replace") {
      string replaceStr;
      cin >> a >> b >> replaceStr;
      str = str.replace(a, b - a + 1, replaceStr);
    }
  }

  return 0;
}
