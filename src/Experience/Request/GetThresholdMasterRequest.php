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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getThresholdMaster: Get Rank Up Threshold Master
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#getthresholdmaster
 */
class GetThresholdMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rank Up Threshold name */
    private $thresholdName;
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
     * @return GetThresholdMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetThresholdMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Rank Up Threshold name */
	public function getThresholdName(): ?string {
		return $this->thresholdName;
	}
    /** @param string|null $thresholdName Rank Up Threshold name */
	public function setThresholdName(?string $thresholdName) {
		$this->thresholdName = $thresholdName;
	}
    /**
     * @param string|null $thresholdName Rank Up Threshold name
     * @return GetThresholdMasterRequest
     */
	public function withThresholdName(?string $thresholdName): GetThresholdMasterRequest {
		$this->thresholdName = $thresholdName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetThresholdMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetThresholdMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withThresholdName(array_key_exists('thresholdName', $data) && $data['thresholdName'] !== null ? $data['thresholdName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "thresholdName" => $this->getThresholdName(),
        );
    }
}