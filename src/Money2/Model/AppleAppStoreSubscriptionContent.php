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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class AppleAppStoreSubscriptionContent implements IModel {
	/**
     * @var string
	 */
	private $subscriptionGroupIdentifier;
	public function getSubscriptionGroupIdentifier(): ?string {
		return $this->subscriptionGroupIdentifier;
	}
	public function setSubscriptionGroupIdentifier(?string $subscriptionGroupIdentifier) {
		$this->subscriptionGroupIdentifier = $subscriptionGroupIdentifier;
	}
	public function withSubscriptionGroupIdentifier(?string $subscriptionGroupIdentifier): AppleAppStoreSubscriptionContent {
		$this->subscriptionGroupIdentifier = $subscriptionGroupIdentifier;
		return $this;
	}

    public static function fromJson(?array $data): ?AppleAppStoreSubscriptionContent {
        if ($data === null) {
            return null;
        }
        return (new AppleAppStoreSubscriptionContent())
            ->withSubscriptionGroupIdentifier(array_key_exists('subscriptionGroupIdentifier', $data) && $data['subscriptionGroupIdentifier'] !== null ? $data['subscriptionGroupIdentifier'] : null);
    }

    public function toJson(): array {
        return array(
            "subscriptionGroupIdentifier" => $this->getSubscriptionGroupIdentifier(),
        );
    }
}