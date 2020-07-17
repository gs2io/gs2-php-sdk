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

/**
 * 達成状況を新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CompleteByUserIdResult implements IResult {
	/** @var string ミッションの達成報酬を受領するスタンプシート */
	private $stampSheet;

	/**
	 * ミッションの達成報酬を受領するスタンプシートを取得
	 *
	 * @return string|null 達成状況を新規作成
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * ミッションの達成報酬を受領するスタンプシートを設定
	 *
	 * @param string|null $stampSheet 達成状況を新規作成
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    public static function fromJson(array $data): CompleteByUserIdResult {
        $result = new CompleteByUserIdResult();
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        return $result;
    }
}