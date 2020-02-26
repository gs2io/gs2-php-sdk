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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;

/**
 * スタンプシートのタスクを実行する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class RunStampTaskResult implements IResult {
	/** @var string タスクの実行結果を反映したコンテキストスタック */
	private $contextStack;
	/** @var string レスポンス内容 */
	private $result;

	/**
	 * タスクの実行結果を反映したコンテキストスタックを取得
	 *
	 * @return string|null スタンプシートのタスクを実行する
	 */
	public function getContextStack(): ?string {
		return $this->contextStack;
	}

	/**
	 * タスクの実行結果を反映したコンテキストスタックを設定
	 *
	 * @param string|null $contextStack スタンプシートのタスクを実行する
	 */
	public function setContextStack(?string $contextStack) {
		$this->contextStack = $contextStack;
	}

	/**
	 * レスポンス内容を取得
	 *
	 * @return string|null スタンプシートのタスクを実行する
	 */
	public function getResult(): ?string {
		return $this->result;
	}

	/**
	 * レスポンス内容を設定
	 *
	 * @param string|null $result スタンプシートのタスクを実行する
	 */
	public function setResult(?string $result) {
		$this->result = $result;
	}

    public static function fromJson(array $data): RunStampTaskResult {
        $result = new RunStampTaskResult();
        $result->setContextStack(isset($data["contextStack"]) ? $data["contextStack"] : null);
        $result->setResult(isset($data["result"]) ? $data["result"] : null);
        return $result;
    }
}