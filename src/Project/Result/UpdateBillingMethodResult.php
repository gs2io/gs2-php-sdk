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

namespace Gs2\Project\Result;

use Gs2\Core\Model\IResult;
use Gs2\Project\Model\BillingMethod;

/** Result of updateBillingMethod: Update payment method */
class UpdateBillingMethodResult implements IResult {
    /** @var BillingMethod Payment method updated */
    private $item;

    /** @return BillingMethod|null Payment method updated */
	public function getItem(): ?BillingMethod {
		return $this->item;
	}

    /** @param BillingMethod|null $item Payment method updated */
	public function setItem(?BillingMethod $item) {
		$this->item = $item;
	}

    /**
     * @param BillingMethod|null $item Payment method updated
     * @return UpdateBillingMethodResult
     */
	public function withItem(?BillingMethod $item): UpdateBillingMethodResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateBillingMethodResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateBillingMethodResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? BillingMethod::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}