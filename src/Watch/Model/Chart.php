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


class Chart implements IModel {
	/**
     * @var string
	 */
	private $chartId;
	/**
     * @var string
	 */
	private $embedId;
	/**
     * @var string
	 */
	private $html;

	public function getChartId(): ?string {
		return $this->chartId;
	}

	public function setChartId(?string $chartId) {
		$this->chartId = $chartId;
	}

	public function withChartId(?string $chartId): Chart {
		$this->chartId = $chartId;
		return $this;
	}

	public function getEmbedId(): ?string {
		return $this->embedId;
	}

	public function setEmbedId(?string $embedId) {
		$this->embedId = $embedId;
	}

	public function withEmbedId(?string $embedId): Chart {
		$this->embedId = $embedId;
		return $this;
	}

	public function getHtml(): ?string {
		return $this->html;
	}

	public function setHtml(?string $html) {
		$this->html = $html;
	}

	public function withHtml(?string $html): Chart {
		$this->html = $html;
		return $this;
	}

    public static function fromJson(?array $data): ?Chart {
        if ($data === null) {
            return null;
        }
        return (new Chart())
            ->withChartId(empty($data['chartId']) ? null : $data['chartId'])
            ->withEmbedId(empty($data['embedId']) ? null : $data['embedId'])
            ->withHtml(empty($data['html']) ? null : $data['html']);
    }

    public function toJson(): array {
        return array(
            "chartId" => $this->getChartId(),
            "embedId" => $this->getEmbedId(),
            "html" => $this->getHtml(),
        );
    }
}