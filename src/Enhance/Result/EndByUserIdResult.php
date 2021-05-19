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
use Gs2\Enhance\Model\Progress;

/**
 * ユーザIDを指定して強化を完了 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class EndByUserIdResult implements IResult {
	/** @var Progress 強化実行 */
	private $item;
	/** @var string 報酬付与処理の実行に使用するスタンプシート */
	private $stampSheet;
	/** @var string スタンプシートの署名計算に使用した暗号鍵GRN */
	private $stampSheetEncryptionKeyId;
	/** @var int 獲得経験値量 */
	private $acquireExperience;
	/** @var float 経験値ボーナスの倍率(1.0=ボーナスなし) */
	private $bonusRate;

	/**
	 * 強化実行を取得
	 *
	 * @return Progress|null ユーザIDを指定して強化を完了
	 */
	public function getItem(): ?Progress {
		return $this->item;
	}

	/**
	 * 強化実行を設定
	 *
	 * @param Progress|null $item ユーザIDを指定して強化を完了
	 */
	public function setItem(?Progress $item) {
		$this->item = $item;
	}

	/**
	 * 報酬付与処理の実行に使用するスタンプシートを取得
	 *
	 * @return string|null ユーザIDを指定して強化を完了
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * 報酬付与処理の実行に使用するスタンプシートを設定
	 *
	 * @param string|null $stampSheet ユーザIDを指定して強化を完了
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	/**
	 * スタンプシートの署名計算に使用した暗号鍵GRNを取得
	 *
	 * @return string|null ユーザIDを指定して強化を完了
	 */
	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	/**
	 * スタンプシートの署名計算に使用した暗号鍵GRNを設定
	 *
	 * @param string|null $stampSheetEncryptionKeyId ユーザIDを指定して強化を完了
	 */
	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	/**
	 * 獲得経験値量を取得
	 *
	 * @return int|null ユーザIDを指定して強化を完了
	 */
	public function getAcquireExperience(): ?int {
		return $this->acquireExperience;
	}

	/**
	 * 獲得経験値量を設定
	 *
	 * @param int|null $acquireExperience ユーザIDを指定して強化を完了
	 */
	public function setAcquireExperience(?int $acquireExperience) {
		$this->acquireExperience = $acquireExperience;
	}

	/**
	 * 経験値ボーナスの倍率(1.0=ボーナスなし)を取得
	 *
	 * @return float|null ユーザIDを指定して強化を完了
	 */
	public function getBonusRate(): ?float {
		return $this->bonusRate;
	}

	/**
	 * 経験値ボーナスの倍率(1.0=ボーナスなし)を設定
	 *
	 * @param float|null $bonusRate ユーザIDを指定して強化を完了
	 */
	public function setBonusRate(?float $bonusRate) {
		$this->bonusRate = $bonusRate;
	}

    public static function fromJson(array $data): EndByUserIdResult {
        $result = new EndByUserIdResult();
        $result->setItem(isset($data["item"]) ? Progress::fromJson($data["item"]) : null);
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        $result->setStampSheetEncryptionKeyId(isset($data["stampSheetEncryptionKeyId"]) ? $data["stampSheetEncryptionKeyId"] : null);
        $result->setAcquireExperience(isset($data["acquireExperience"]) ? $data["acquireExperience"] : null);
        $result->setBonusRate(isset($data["bonusRate"]) ? $data["bonusRate"] : null);
        return $result;
    }
}