# Kolotoc Puzzle Generator

A PHP script to generate and integrate custom puzzles for the game [Kolotoc](https://crazypiri.itch.io/kolotoc), a "Wheel of Fortune"-inspired game released on December 24, 2024.

This repository provides the script used to create a binary file (`kolo2.bin`) that organizes puzzles into categories. The binary file can then be integrated into the game to add your own personalized content.

---

## Features

- **Text cleaning and formatting**:
  - Removes accents and special characters.
  - Converts text to uppercase for consistency.

- **Binary file generation**:
  - Converts categorized puzzles from text files into a compact binary format optimized for Kolotoc.

- **Optional header file generation**:
  - Creates `.h` files for use in C projects (for advanced users).

---

## File Structure of `kolo2.bin`

The generated binary file follows a specific structure:
- **Signature**: 3 bytes (`KWF`) to identify the format.
- **Number of categories**: 1 byte.
- **Category metadata**:
  - Title positions.
  - Starting points and lengths of puzzle lists.
- **Puzzle list**:
  - Positions and text of each puzzle.

---

## Prerequisites

- PHP installed on your system.

---

## How to Use

1. **Prepare text files**:
   - Each file represents a category.
   - Write one puzzle per line.

2. **Run the script**:
   Use the following command in your terminal:
   ```bash
   php compile.php <folder>
