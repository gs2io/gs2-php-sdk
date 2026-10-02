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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getStoreSubscriptionContentModelMaster: Get Store Subscription Content Model Master
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#getstoresubscriptioncontentmodelmaster
 */
class GetStoreSubscriptionContentModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Store Subscription Content Model name */
    private $contentName;
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
     * @return GetStoreSubscriptionContentModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetStoreSubscriptionContentModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Store Subscription Content Model name */
	public function getContentName(): ?string {
		return $this->contentName;
	}
    /** @param string|null $contentName Store Subscription Content Model name */
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
    /**
     * @param string|null $contentName Store Subscription Content Model name
     * @return GetStoreSubscriptionContentModelMasterRequest
     */
	public function withContentName(?string $contentName): GetStoreSubscriptionContentModelMasterRequest {
		$this->contentName = $contentName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetStoreSubscriptionContentModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetStoreSubscriptionContentModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "contentName" => $this->getContentName(),
        );
    }
}