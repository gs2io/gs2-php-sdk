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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for deleteInsight: Delete a insight
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#deleteinsight
 */
class DeleteInsightRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Name */
    private $insightName;
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
     * @return DeleteInsightRequest
     */
	public function withNamespaceName(?string $namespaceName): DeleteInsightRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Name */
	public function getInsightName(): ?string {
		return $this->insightName;
	}
    /** @param string|null $insightName Name */
	public function setInsightName(?string $insightName) {
		$this->insightName = $insightName;
	}
    /**
     * @param string|null $insightName Name
     * @return DeleteInsightRequest
     */
	public function withInsightName(?string $insightName): DeleteInsightRequest {
		$this->insightName = $insightName;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteInsightRequest {
        if ($data === null) {
            return null;
        }
        return (new DeleteInsightRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withInsightName(array_key_exists('insightName', $data) && $data['insightName'] !== null ? $data['insightName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "insightName" => $this->getInsightName(),
        );
    }
}