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

namespace Gs2\Quest\Result;

use Gs2\Core\Model\IResult;
use Gs2\Quest\Model\Progress;

/**
 * スタンプタスクで クエスト挑戦 を削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteProgressByStampTaskResult implements IResult {
	/** @var Progress クエスト挑戦 */
	private $item;
	/** @var string スタンプタスクの実行結果を記録したコンテキスト */
	private $newContextStack;

	/**
	 * クエスト挑戦を取得
	 *
	 * @return Progress|null スタンプタスクで クエスト挑戦 を削除
	 */
	public function getItem(): ?Progress {
		return $this->item;
	}

	/**
	 * クエスト挑戦を設定
	 *
	 * @param Progress|null $item スタンプタスクで クエスト挑戦 を削除
	 */
	public function setItem(?Progress $item) {
		$this->item = $item;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを取得
	 *
	 * @return string|null スタンプタスクで クエスト挑戦 を削除
	 */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを設定
	 *
	 * @param string|null $newContextStack スタンプタスクで クエスト挑戦 を削除
	 */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    public static function fromJson(array $data): DeleteProgressByStampTaskResult {
        $result = new DeleteProgressByStampTaskResult();
        $result->setItem(isset($data["item"]) ? Progress::fromJson($data["item"]) : null);
        $result->setNewContextStack(isset($data["newContextStack"]) ? $data["newContextStack"] : null);
        return $result;
    }
}