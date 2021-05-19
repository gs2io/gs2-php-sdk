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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;

/**
 * ユーザIDを指定して強化を開始 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class StartByUserIdResult implements IResult {
	/** @var string 強化の開始処理の実行に使用するスタンプシート */
	private $stampSheet;
	/** @var string スタンプシートの署名計算に使用した暗号鍵GRN */
	private $stampSheetEncryptionKeyId;

	/**
	 * 強化の開始処理の実行に使用するスタンプシートを取得
	 *
	 * @return string|null ユーザIDを指定して強化を開始
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * 強化の開始処理の実行に使用するスタンプシートを設定
	 *
	 * @param string|null $stampSheet ユーザIDを指定して強化を開始
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	/**
	 * スタンプシートの署名計算に使用した暗号鍵GRNを取得
	 *
	 * @return string|null ユーザIDを指定して強化を開始
	 */
	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	/**
	 * スタンプシートの署名計算に使用した暗号鍵GRNを設定
	 *
	 * @param string|null $stampSheetEncryptionKeyId ユーザIDを指定して強化を開始
	 */
	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

    public static function fromJson(array $data): StartByUserIdResult {
        $result = new StartByUserIdResult();
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        $result->setStampSheetEncryptionKeyId(isset($data["stampSheetEncryptionKeyId"]) ? $data["stampSheetEncryptionKeyId"] : null);
        return $result;
    }
}