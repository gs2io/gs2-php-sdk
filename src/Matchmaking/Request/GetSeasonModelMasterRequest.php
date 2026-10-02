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
 * Request for getSeasonModelMaster: Get Season Model Master
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#getseasonmodelmaster
 */
class GetSeasonModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Season Model name */
    private $seasonName;
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
     * @return GetSeasonModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetSeasonModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Season Model name */
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
    /** @param string|null $seasonName Season Model name */
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
    /**
     * @param string|null $seasonName Season Model name
     * @return GetSeasonModelMasterRequest
     */
	public function withSeasonName(?string $seasonName): GetSeasonModelMasterRequest {
		$this->seasonName = $seasonName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSeasonModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetSeasonModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "seasonName" => $this->getSeasonName(),
        );
    }
}