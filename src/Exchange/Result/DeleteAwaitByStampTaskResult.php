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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\Await;

/**
 * スタンプタスクで 交換待機 を削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteAwaitByStampTaskResult implements IResult {
	/** @var Await 交換待機 */
	private $item;
	/** @var string スタンプタスクの実行結果を記録したコンテキスト */
	private $newContextStack;

	/**
	 * 交換待機を取得
	 *
	 * @return Await|null スタンプタスクで 交換待機 を削除
	 */
	public function getItem(): ?Await {
		return $this->item;
	}

	/**
	 * 交換待機を設定
	 *
	 * @param Await|null $item スタンプタスクで 交換待機 を削除
	 */
	public function setItem(?Await $item) {
		$this->item = $item;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを取得
	 *
	 * @return string|null スタンプタスクで 交換待機 を削除
	 */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを設定
	 *
	 * @param string|null $newContextStack スタンプタスクで 交換待機 を削除
	 */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    public static function fromJson(array $data): DeleteAwaitByStampTaskResult {
        $result = new DeleteAwaitByStampTaskResult();
        $result->setItem(isset($data["item"]) ? Await::fromJson($data["item"]) : null);
        $result->setNewContextStack(isset($data["newContextStack"]) ? $data["newContextStack"] : null);
        return $result;
    }
}