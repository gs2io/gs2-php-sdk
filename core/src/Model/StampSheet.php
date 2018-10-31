<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Core\Model;

/**
 * スタンプシート
 *
 * @author Game Server Services, Inc.
 *
 */
class StampSheet {

	/**
     * スタンプシートデータ
     * @var string
     */
	private $sheet;

	/**
     * @var array<int, StampTask>
     */
	private $tasks;

	/**
     * スタンプシート関連の処理の実行で使用するトランザクションID
     * @var string
     */
	private $transactionId;


	/**
	 * スタンプシートデータを取得
	 *
	 * @return string スタンプシートデータ
	 */
	function getSheet(): string {
		return $this->sheet;
	}

	/**
	 * スタンプシートデータを設定
	 *
	 * @param string $sheet スタンプシートデータ
	 */
	function setSheet(string $sheet): void {
		$this->sheet = $sheet;
	}

	/**
	 * スタンプタスク一覧 を取得
	 *
	 * @return array<int, StampTask> スタンプタスク一覧
	 */
	function getTasks(): array {
		return $this->tasks;
	}

	/**
	 * スタンプタスク一覧 を設定
	 *
	 * @param array<int, StampTask> $tasks スタンプタスク一覧
	 */
	function setTasks(array $tasks): void {
		$this->tasks = $tasks;
	}

	/**
	 * スタンプシート関連の処理の実行で使用するトランザクションIDを取得
	 *
	 * @return string スタンプシート関連の処理の実行で使用するトランザクションID
	 */
	function getTransactionId(): string {
		return $this->transactionId;
	}

	/**
	 * スタンプシート関連の処理の実行で使用するトランザクションIDを設定
	 *
	 * @param string $transactionId スタンプシート関連の処理の実行で使用するトランザクションID
	 */
	function setTransactionId(string $transactionId): void {
		$this->transactionId = $transactionId;
	}

}