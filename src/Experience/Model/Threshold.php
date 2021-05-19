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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;

/**
 * ランクアップ閾値
 *
 * @author Game Server Services, Inc.
 *
 */
class Threshold implements IModel {
	/**
     * @var string ランクアップ閾値のメタデータ
	 */
	protected $metadata;

	/**
	 * ランクアップ閾値のメタデータを取得
	 *
	 * @return string|null ランクアップ閾値のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * ランクアップ閾値のメタデータを設定
	 *
	 * @param string|null $metadata ランクアップ閾値のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * ランクアップ閾値のメタデータを設定
	 *
	 * @param string|null $metadata ランクアップ閾値のメタデータ
	 * @return Threshold $this
	 */
	public function withMetadata(?string $metadata): Threshold {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int[] ランクアップ経験値閾値リスト
	 */
	protected $values;

	/**
	 * ランクアップ経験値閾値リストを取得
	 *
	 * @return int[]|null ランクアップ経験値閾値リスト
	 */
	public function getValues(): ?array {
		return $this->values;
	}

	/**
	 * ランクアップ経験値閾値リストを設定
	 *
	 * @param int[]|null $values ランクアップ経験値閾値リスト
	 */
	public function setValues(?array $values) {
		$this->values = $values;
	}

	/**
	 * ランクアップ経験値閾値リストを設定
	 *
	 * @param int[]|null $values ランクアップ経験値閾値リスト
	 * @return Threshold $this
	 */
	public function withValues(?array $values): Threshold {
		$this->values = $values;
		return $this;
	}

    public function toJson(): array {
        return array(
            "metadata" => $this->metadata,
            "values" => $this->values,
        );
    }

    public static function fromJson(array $data): Threshold {
        $model = new Threshold();
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setValues(isset($data["values"]) ? $data["values"] : null);
        return $model;
    }
}