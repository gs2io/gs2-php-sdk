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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\Complete;

/**
 * 達成状況を作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ReceiveByStampTaskResult implements IResult {
	/** @var Complete 達成状況 */
	private $item;
	/** @var string スタンプタスクの実行結果を記録したコンテキスト */
	private $newContextStack;

	/**
	 * 達成状況を取得
	 *
	 * @return Complete|null 達成状況を作成
	 */
	public function getItem(): ?Complete {
		return $this->item;
	}

	/**
	 * 達成状況を設定
	 *
	 * @param Complete|null $item 達成状況を作成
	 */
	public function setItem(?Complete $item) {
		$this->item = $item;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを取得
	 *
	 * @return string|null 達成状況を作成
	 */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを設定
	 *
	 * @param string|null $newContextStack 達成状況を作成
	 */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    public static function fromJson(array $data): ReceiveByStampTaskResult {
        $result = new ReceiveByStampTaskResult();
        $result->setItem(isset($data["item"]) ? Complete::fromJson($data["item"]) : null);
        $result->setNewContextStack(isset($data["newContextStack"]) ? $data["newContextStack"] : null);
        return $result;
    }
}