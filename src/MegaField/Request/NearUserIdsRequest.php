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

namespace Gs2\MegaField\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\MegaField\Model\Position;

class NearUserIdsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $areaModelName;
    /** @var string */
    private $layerModelName;
    /** @var Position */
    private $point;
    /** @var float */
    private $r;
    /** @var int */
    private $limit;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): NearUserIdsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): NearUserIdsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
	public function withAreaModelName(?string $areaModelName): NearUserIdsRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
	public function withLayerModelName(?string $layerModelName): NearUserIdsRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
	public function getPoint(): ?Position {
		return $this->point;
	}
	public function setPoint(?Position $point) {
		$this->point = $point;
	}
	public function withPoint(?Position $point): NearUserIdsRequest {
		$this->point = $point;
		return $this;
	}
	public function getR(): ?float {
		return $this->r;
	}
	public function setR(?float $r) {
		$this->r = $r;
	}
	public function withR(?float $r): NearUserIdsRequest {
		$this->r = $r;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): NearUserIdsRequest {
		$this->limit = $limit;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): NearUserIdsRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?NearUserIdsRequest {
        if ($data === null) {
            return null;
        }
        return (new NearUserIdsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withAreaModelName(array_key_exists('areaModelName', $data) && $data['areaModelName'] !== null ? $data['areaModelName'] : null)
            ->withLayerModelName(array_key_exists('layerModelName', $data) && $data['layerModelName'] !== null ? $data['layerModelName'] : null)
            ->withPoint(array_key_exists('point', $data) && $data['point'] !== null ? Position::fromJson($data['point']) : null)
            ->withR(array_key_exists('r', $data) && $data['r'] !== null ? $data['r'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "areaModelName" => $this->getAreaModelName(),
            "layerModelName" => $this->getLayerModelName(),
            "point" => $this->getPoint() !== null ? $this->getPoint()->toJson() : null,
            "r" => $this->getR(),
            "limit" => $this->getLimit(),
        );
    }
}