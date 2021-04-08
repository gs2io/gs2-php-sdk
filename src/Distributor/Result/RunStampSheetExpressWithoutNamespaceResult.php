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
 * スタンプタスクおよびスタンプシートを実行する のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class RunStampSheetExpressWithoutNamespaceResult implements IResult {
	/** @var string[] スタンプタスクの実行結果 */
	private $taskResults;
	/** @var string スタンプシートの実行結果レスポンス内容 */
	private $sheetResult;

	/**
	 * スタンプタスクの実行結果を取得
	 *
	 * @return string[]|null スタンプタスクおよびスタンプシートを実行する
	 */
	public function getTaskResults(): ?array {
		return $this->taskResults;
	}

	/**
	 * スタンプタスクの実行結果を設定
	 *
	 * @param string[]|null $taskResults スタンプタスクおよびスタンプシートを実行する
	 */
	public function setTaskResults(?array $taskResults) {
		$this->taskResults = $taskResults;
	}

	/**
	 * スタンプシートの実行結果レスポンス内容を取得
	 *
	 * @return string|null スタンプタスクおよびスタンプシートを実行する
	 */
	public function getSheetResult(): ?string {
		return $this->sheetResult;
	}

	/**
	 * スタンプシートの実行結果レスポンス内容を設定
	 *
	 * @param string|null $sheetResult スタンプタスクおよびスタンプシートを実行する
	 */
	public function setSheetResult(?string $sheetResult) {
		$this->sheetResult = $sheetResult;
	}

    public static function fromJson(array $data): RunStampSheetExpressWithoutNamespaceResult {
        $result = new RunStampSheetExpressWithoutNamespaceResult();
        $result->setTaskResults(isset($data["taskResults"]) ? $data["taskResults"] : null);
        $result->setSheetResult(isset($data["sheetResult"]) ? $data["sheetResult"] : null);
        return $result;
    }
}