<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Level\Model;

/**
 * レベルアップ経験値閾値
 *
 * @author Game Server Services, Inc.
 *
 */
class LevelThresholdMaster {

	/** @var string レベルアップ経験値閾値GRN */
	private $thresholdId;

	/** @var long レベルアップ経験値閾値 */
	private $threshold;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * レベルアップ経験値閾値GRNを取得
	 *
	 * @return string レベルアップ経験値閾値GRN
	 */
	public function getThresholdId() {
		return $this->thresholdId;
	}

	/**
	 * レベルアップ経験値閾値GRNを設定
	 *
	 * @param string $thresholdId レベルアップ経験値閾値GRN
	 */
	public function setThresholdId($thresholdId) {
		$this->thresholdId = $thresholdId;
	}

	/**
	 * レベルアップ経験値閾値GRNを設定
	 *
	 * @param string $thresholdId レベルアップ経験値閾値GRN
	 * @return self
	 */
	public function withThresholdId($thresholdId): self {
		$this->setThresholdId($thresholdId);
		return $this;
	}

	/**
	 * レベルアップ経験値閾値を取得
	 *
	 * @return long レベルアップ経験値閾値
	 */
	public function getThreshold() {
		return $this->threshold;
	}

	/**
	 * レベルアップ経験値閾値を設定
	 *
	 * @param long $threshold レベルアップ経験値閾値
	 */
	public function setThreshold($threshold) {
		$this->threshold = $threshold;
	}

	/**
	 * レベルアップ経験値閾値を設定
	 *
	 * @param long $threshold レベルアップ経験値閾値
	 * @return self
	 */
	public function withThreshold($threshold): self {
		$this->setThreshold($threshold);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return LevelThresholdMaster
	 */
    static function build(array $array)
    {
        $item = new LevelThresholdMaster();
        $item->setThresholdId(isset($array['thresholdId']) ? $array['thresholdId'] : null);
        $item->setThreshold(isset($array['threshold']) ? $array['threshold'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}