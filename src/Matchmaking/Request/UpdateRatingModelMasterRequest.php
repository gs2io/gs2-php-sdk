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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateRatingModelMaster: Update Rating Model Master
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#updateratingmodelmaster
 */
class UpdateRatingModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rating Model name */
    private $ratingName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var int Initial Rating Value */
    private $initialValue;
    /** @var int Rating Volatility */
    private $volatility;
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
     * @return UpdateRatingModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateRatingModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Rating Model name */
	public function getRatingName(): ?string {
		return $this->ratingName;
	}
    /** @param string|null $ratingName Rating Model name */
	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}
    /**
     * @param string|null $ratingName Rating Model name
     * @return UpdateRatingModelMasterRequest
     */
	public function withRatingName(?string $ratingName): UpdateRatingModelMasterRequest {
		$this->ratingName = $ratingName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateRatingModelMasterRequest
     */
	public function withDescription(?string $description): UpdateRatingModelMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return UpdateRatingModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateRatingModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Initial Rating Value */
	public function getInitialValue(): ?int {
		return $this->initialValue;
	}
    /** @param int|null $initialValue Initial Rating Value */
	public function setInitialValue(?int $initialValue) {
		$this->initialValue = $initialValue;
	}
    /**
     * @param int|null $initialValue Initial Rating Value
     * @return UpdateRatingModelMasterRequest
     */
	public function withInitialValue(?int $initialValue): UpdateRatingModelMasterRequest {
		$this->initialValue = $initialValue;
		return $this;
	}
    /** @return int|null Rating Volatility */
	public function getVolatility(): ?int {
		return $this->volatility;
	}
    /** @param int|null $volatility Rating Volatility */
	public function setVolatility(?int $volatility) {
		$this->volatility = $volatility;
	}
    /**
     * @param int|null $volatility Rating Volatility
     * @return UpdateRatingModelMasterRequest
     */
	public function withVolatility(?int $volatility): UpdateRatingModelMasterRequest {
		$this->volatility = $volatility;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRatingModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRatingModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRatingName(array_key_exists('ratingName', $data) && $data['ratingName'] !== null ? $data['ratingName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInitialValue(array_key_exists('initialValue', $data) && $data['initialValue'] !== null ? $data['initialValue'] : null)
            ->withVolatility(array_key_exists('volatility', $data) && $data['volatility'] !== null ? $data['volatility'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "ratingName" => $this->getRatingName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "initialValue" => $this->getInitialValue(),
            "volatility" => $this->getVolatility(),
        );
    }
}