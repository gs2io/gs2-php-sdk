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
use Gs2\Enhance\Model\RateModel;

/**
 * 強化を実行 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DirectEnhanceResult implements IResult {
	/** @var RateModel 強化レートモデル */
	private $item;
	/** @var string 強化処理の実行に使用するスタンプシート */
	private $stampSheet;
	/** @var string スタンプシートの署名計算に使用した暗号鍵GRN */
	private $stampSheetEncryptionKeyId;
	/** @var int 獲得経験値量 */
	private $acquireExperience;
	/** @var float 経験値ボーナスの倍率(1.0=ボーナスなし) */
	private $bonusRate;

	/**
	 * 強化レートモデルを取得
	 *
	 * @return RateModel|null 強化を実行
	 */
	public function getItem(): ?RateModel {
		return $this->item;
	}

	/**
	 * 強化レートモデルを設定
	 *
	 * @param RateModel|null $item 強化を実行
	 */
	public function setItem(?RateModel $item) {
		$this->item = $item;
	}

	/**
	 * 強化処理の実行に使用するスタンプシートを取得
	 *
	 * @return string|null 強化を実行
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * 強化処理の実行に使用するスタンプシートを設定
	 *
	 * @param string|null $stampSheet 強化を実行
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

	/**
	 * スタンプシートの署名計算に使用した暗号鍵GRNを取得
	 *
	 * @return string|null 強化を実行
	 */
	public function getStampSheetEncryptionKeyId(): ?string {
		return $this->stampSheetEncryptionKeyId;
	}

	/**
	 * スタンプシートの署名計算に使用した暗号鍵GRNを設定
	 *
	 * @param string|null $stampSheetEncryptionKeyId 強化を実行
	 */
	public function setStampSheetEncryptionKeyId(?string $stampSheetEncryptionKeyId) {
		$this->stampSheetEncryptionKeyId = $stampSheetEncryptionKeyId;
	}

	/**
	 * 獲得経験値量を取得
	 *
	 * @return int|null 強化を実行
	 */
	public function getAcquireExperience(): ?int {
		return $this->acquireExperience;
	}

	/**
	 * 獲得経験値量を設定
	 *
	 * @param int|null $acquireExperience 強化を実行
	 */
	public function setAcquireExperience(?int $acquireExperience) {
		$this->acquireExperience = $acquireExperience;
	}

	/**
	 * 経験値ボーナスの倍率(1.0=ボーナスなし)を取得
	 *
	 * @return float|null 強化を実行
	 */
	public function getBonusRate(): ?float {
		return $this->bonusRate;
	}

	/**
	 * 経験値ボーナスの倍率(1.0=ボーナスなし)を設定
	 *
	 * @param float|null $bonusRate 強化を実行
	 */
	public function setBonusRate(?float $bonusRate) {
		$this->bonusRate = $bonusRate;
	}

    public static function fromJson(array $data): DirectEnhanceResult {
        $result = new DirectEnhanceResult();
        $result->setItem(isset($data["item"]) ? RateModel::fromJson($data["item"]) : null);
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        $result->setStampSheetEncryptionKeyId(isset($data["stampSheetEncryptionKeyId"]) ? $data["stampSheetEncryptionKeyId"] : null);
        $result->setAcquireExperience(isset($data["acquireExperience"]) ? $data["acquireExperience"] : null);
        $result->setBonusRate(isset($data["bonusRate"]) ? $data["bonusRate"] : null);
        return $result;
    }
}