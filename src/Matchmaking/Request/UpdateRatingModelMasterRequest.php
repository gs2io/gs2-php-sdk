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

class UpdateRatingModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $ratingName;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var int */
    private $volatility;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateRatingModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getRatingName(): ?string {
		return $this->ratingName;
	}

	public function setRatingName(?string $ratingName) {
		$this->ratingName = $ratingName;
	}

	public function withRatingName(?string $ratingName): UpdateRatingModelMasterRequest {
		$this->ratingName = $ratingName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateRatingModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateRatingModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getVolatility(): ?int {
		return $this->volatility;
	}

	public function setVolatility(?int $volatility) {
		$this->volatility = $volatility;
	}

	public function withVolatility(?int $volatility): UpdateRatingModelMasterRequest {
		$this->volatility = $volatility;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRatingModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRatingModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withRatingName(empty($data['ratingName']) ? null : $data['ratingName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withVolatility(empty($data['volatility']) ? null : $data['volatility']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "ratingName" => $this->getRatingName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "volatility" => $this->getVolatility(),
        );
    }
}