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

class GetInsightRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $insightName;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetInsightRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getInsightName(): ?string {
		return $this->insightName;
	}
	public function setInsightName(?string $insightName) {
		$this->insightName = $insightName;
	}
	public function withInsightName(?string $insightName): GetInsightRequest {
		$this->insightName = $insightName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetInsightRequest {
        if ($data === null) {
            return null;
        }
        return (new GetInsightRequest())
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