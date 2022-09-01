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

namespace Gs2\MegaField\Model;

use Gs2\Core\Model\IModel;


class Scope implements IModel {
	/**
     * @var string
	 */
	private $layerName;
	/**
     * @var float
	 */
	private $r;
	/**
     * @var int
	 */
	private $limit;
	public function getLayerName(): ?string {
		return $this->layerName;
	}
	public function setLayerName(?string $layerName) {
		$this->layerName = $layerName;
	}
	public function withLayerName(?string $layerName): Scope {
		$this->layerName = $layerName;
		return $this;
	}
	public function getR(): ?float {
		return $this->r;
	}
	public function setR(?float $r) {
		$this->r = $r;
	}
	public function withR(?float $r): Scope {
		$this->r = $r;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): Scope {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?Scope {
        if ($data === null) {
            return null;
        }
        return (new Scope())
            ->withLayerName(array_key_exists('layerName', $data) && $data['layerName'] !== null ? $data['layerName'] : null)
            ->withR(array_key_exists('r', $data) && $data['r'] !== null ? $data['r'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "layerName" => $this->getLayerName(),
            "r" => $this->getR(),
            "limit" => $this->getLimit(),
        );
    }
}