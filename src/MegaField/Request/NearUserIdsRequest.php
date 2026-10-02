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

/**
 * Request for nearUserIds: Fetch list of nearby user IDs
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#nearuserids
 */
class NearUserIdsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Area name */
    private $areaModelName;
    /** @var string Layer name */
    private $layerModelName;
    /** @var Position Point */
    private $point;
    /** @var float Radius */
    private $r;
    /** @var int Maximum number of result */
    private $limit;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return NearUserIdsRequest
     */
	public function withNamespaceName(?string $namespaceName): NearUserIdsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return NearUserIdsRequest
     */
	public function withAccessToken(?string $accessToken): NearUserIdsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Area name */
	public function getAreaModelName(): ?string {
		return $this->areaModelName;
	}
    /** @param string|null $areaModelName Area name */
	public function setAreaModelName(?string $areaModelName) {
		$this->areaModelName = $areaModelName;
	}
    /**
     * @param string|null $areaModelName Area name
     * @return NearUserIdsRequest
     */
	public function withAreaModelName(?string $areaModelName): NearUserIdsRequest {
		$this->areaModelName = $areaModelName;
		return $this;
	}
    /** @return string|null Layer name */
	public function getLayerModelName(): ?string {
		return $this->layerModelName;
	}
    /** @param string|null $layerModelName Layer name */
	public function setLayerModelName(?string $layerModelName) {
		$this->layerModelName = $layerModelName;
	}
    /**
     * @param string|null $layerModelName Layer name
     * @return NearUserIdsRequest
     */
	public function withLayerModelName(?string $layerModelName): NearUserIdsRequest {
		$this->layerModelName = $layerModelName;
		return $this;
	}
    /** @return Position|null Point */
	public function getPoint(): ?Position {
		return $this->point;
	}
    /** @param Position|null $point Point */
	public function setPoint(?Position $point) {
		$this->point = $point;
	}
    /**
     * @param Position|null $point Point
     * @return NearUserIdsRequest
     */
	public function withPoint(?Position $point): NearUserIdsRequest {
		$this->point = $point;
		return $this;
	}
    /** @return float|null Radius */
	public function getR(): ?float {
		return $this->r;
	}
    /** @param float|null $r Radius */
	public function setR(?float $r) {
		$this->r = $r;
	}
    /**
     * @param float|null $r Radius
     * @return NearUserIdsRequest
     */
	public function withR(?float $r): NearUserIdsRequest {
		$this->r = $r;
		return $this;
	}
    /** @return int|null Maximum number of result */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Maximum number of result */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Maximum number of result
     * @return NearUserIdsRequest
     */
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