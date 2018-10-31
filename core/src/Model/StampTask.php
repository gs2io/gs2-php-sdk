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
 * スタンプシートタスク
 *
 * @author Game Server Services, Inc.
 *
 */
class StampTask {

	/**
     * アクション名
     * @var string
     */
	private $action;

	/**
     * スタンプシートタスクデータ
     * @var string
     */
	private $task;


	/**
	 * アクション名を取得
	 *
	 * @return string アクション名
	 */
	function getAction(): string {
		return $this->action;
	}

	/**
	 * アクション名を設定
	 *
	 * @param string $action アクション名
	 */
	function setAction(string $action): void {
		$this->action = $action;
	}

	/**
	 * スタンプシートタスクデータを取得
	 *
	 * @return string スタンプシートタスクデータ
	 */
	function getTask(): string {
		return $this->task;
	}

	/**
	 * スタンプシートタスクデータを設定
	 *
	 * @param string $task スタンプシートタスクデータ
	 */
	function setTask(string $task): void {
		$this->task = $task;
	}

}