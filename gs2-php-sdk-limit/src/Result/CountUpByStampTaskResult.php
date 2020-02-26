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

namespace Gs2\Limit\Result;

use Gs2\Core\Model\IResult;
use Gs2\Limit\Model\Counter;

/**
 * スタンプシートでカウントアップ のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CountUpByStampTaskResult implements IResult {
	/** @var Counter カウントを増やしたカウンター */
	private $item;
	/** @var string スタンプタスクの実行結果を記録したコンテキスト */
	private $newContextStack;

	/**
	 * カウントを増やしたカウンターを取得
	 *
	 * @return Counter|null スタンプシートでカウントアップ
	 */
	public function getItem(): ?Counter {
		return $this->item;
	}

	/**
	 * カウントを増やしたカウンターを設定
	 *
	 * @param Counter|null $item スタンプシートでカウントアップ
	 */
	public function setItem(?Counter $item) {
		$this->item = $item;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを取得
	 *
	 * @return string|null スタンプシートでカウントアップ
	 */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを設定
	 *
	 * @param string|null $newContextStack スタンプシートでカウントアップ
	 */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    public static function fromJson(array $data): CountUpByStampTaskResult {
        $result = new CountUpByStampTaskResult();
        $result->setItem(isset($data["item"]) ? Counter::fromJson($data["item"]) : null);
        $result->setNewContextStack(isset($data["newContextStack"]) ? $data["newContextStack"] : null);
        return $result;
    }
}