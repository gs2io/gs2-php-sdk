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

namespace Gs2\Money\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money\Model\Receipt;

/**
 * スタンプシートを使用してレシートを記録 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class RecordReceiptByStampTaskResult implements IResult {
	/** @var Receipt レシート */
	private $item;
	/** @var string スタンプタスクの実行結果を記録したコンテキスト */
	private $newContextStack;

	/**
	 * レシートを取得
	 *
	 * @return Receipt|null スタンプシートを使用してレシートを記録
	 */
	public function getItem(): ?Receipt {
		return $this->item;
	}

	/**
	 * レシートを設定
	 *
	 * @param Receipt|null $item スタンプシートを使用してレシートを記録
	 */
	public function setItem(?Receipt $item) {
		$this->item = $item;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを取得
	 *
	 * @return string|null スタンプシートを使用してレシートを記録
	 */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを設定
	 *
	 * @param string|null $newContextStack スタンプシートを使用してレシートを記録
	 */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    public static function fromJson(array $data): RecordReceiptByStampTaskResult {
        $result = new RecordReceiptByStampTaskResult();
        $result->setItem(isset($data["item"]) ? Receipt::fromJson($data["item"]) : null);
        $result->setNewContextStack(isset($data["newContextStack"]) ? $data["newContextStack"] : null);
        return $result;
    }
}