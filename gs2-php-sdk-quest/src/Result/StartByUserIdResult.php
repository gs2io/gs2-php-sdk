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

/**
 * ユーザIDを指定してクエストを開始 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class StartByUserIdResult implements IResult {
	/** @var string クエストの開始処理の実行に使用するスタンプシート */
	private $stampSheet;

	/**
	 * クエストの開始処理の実行に使用するスタンプシートを取得
	 *
	 * @return string|null ユーザIDを指定してクエストを開始
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * クエストの開始処理の実行に使用するスタンプシートを設定
	 *
	 * @param string|null $stampSheet ユーザIDを指定してクエストを開始
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    public static function fromJson(array $data): StartByUserIdResult {
        $result = new StartByUserIdResult();
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        return $result;
    }
}