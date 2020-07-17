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

namespace Gs2\Watch\Model;

use Gs2\Core\Model\IModel;

/**
 * チャート
 *
 * @author Game Server Services, Inc.
 *
 */
class Chart implements IModel {
	/**
     * @var string Datadog のJSON 形式のグラフ定義
	 */
	protected $chartId;

	/**
	 * Datadog のJSON 形式のグラフ定義を取得
	 *
	 * @return string|null Datadog のJSON 形式のグラフ定義
	 */
	public function getChartId(): ?string {
		return $this->chartId;
	}

	/**
	 * Datadog のJSON 形式のグラフ定義を設定
	 *
	 * @param string|null $chartId Datadog のJSON 形式のグラフ定義
	 */
	public function setChartId(?string $chartId) {
		$this->chartId = $chartId;
	}

	/**
	 * Datadog のJSON 形式のグラフ定義を設定
	 *
	 * @param string|null $chartId Datadog のJSON 形式のグラフ定義
	 * @return Chart $this
	 */
	public function withChartId(?string $chartId): Chart {
		$this->chartId = $chartId;
		return $this;
	}
	/**
     * @var string オーナーID
	 */
	protected $ownerId;

	/**
	 * オーナーIDを取得
	 *
	 * @return string|null オーナーID
	 */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string|null $ownerId オーナーID
	 * @return Chart $this
	 */
	public function withOwnerId(?string $ownerId): Chart {
		$this->ownerId = $ownerId;
		return $this;
	}
	/**
     * @var string Datadog から払い出された組み込みID
	 */
	protected $embedId;

	/**
	 * Datadog から払い出された組み込みIDを取得
	 *
	 * @return string|null Datadog から払い出された組み込みID
	 */
	public function getEmbedId(): ?string {
		return $this->embedId;
	}

	/**
	 * Datadog から払い出された組み込みIDを設定
	 *
	 * @param string|null $embedId Datadog から払い出された組み込みID
	 */
	public function setEmbedId(?string $embedId) {
		$this->embedId = $embedId;
	}

	/**
	 * Datadog から払い出された組み込みIDを設定
	 *
	 * @param string|null $embedId Datadog から払い出された組み込みID
	 * @return Chart $this
	 */
	public function withEmbedId(?string $embedId): Chart {
		$this->embedId = $embedId;
		return $this;
	}
	/**
     * @var string Datadog から払い出された組み込み用HTML
	 */
	protected $html;

	/**
	 * Datadog から払い出された組み込み用HTMLを取得
	 *
	 * @return string|null Datadog から払い出された組み込み用HTML
	 */
	public function getHtml(): ?string {
		return $this->html;
	}

	/**
	 * Datadog から払い出された組み込み用HTMLを設定
	 *
	 * @param string|null $html Datadog から払い出された組み込み用HTML
	 */
	public function setHtml(?string $html) {
		$this->html = $html;
	}

	/**
	 * Datadog から払い出された組み込み用HTMLを設定
	 *
	 * @param string|null $html Datadog から払い出された組み込み用HTML
	 * @return Chart $this
	 */
	public function withHtml(?string $html): Chart {
		$this->html = $html;
		return $this;
	}

    public function toJson(): array {
        return array(
            "chartId" => $this->chartId,
            "ownerId" => $this->ownerId,
            "embedId" => $this->embedId,
            "html" => $this->html,
        );
    }

    public static function fromJson(array $data): Chart {
        $model = new Chart();
        $model->setChartId(isset($data["chartId"]) ? $data["chartId"] : null);
        $model->setOwnerId(isset($data["ownerId"]) ? $data["ownerId"] : null);
        $model->setEmbedId(isset($data["embedId"]) ? $data["embedId"] : null);
        $model->setHtml(isset($data["html"]) ? $data["html"] : null);
        return $model;
    }
}